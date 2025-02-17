<!DOCTYPE html>
<html lang="hi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Business vCard for {{ $user->name ?? 'User' }}" />
  <title>V Card</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen flex items-center justify-center p-4">

  <!-- Back Button -->
  <div class="absolute top-4 left-4 md:top-8 md:left-20 z-10">
    <a href="{{ route('vCard.list') }}"
      class="bg-blue-500 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-blue-600 transition">
      <i class="bx bx-left-arrow-alt text-lg"></i>
    </a>
  </div>

  <!-- Card Container -->
  <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-xl w-full border border-gray-300 p-4 sm:p-6">

    @if(isset($message))
    <!-- Warning Message -->
    <div class="bg-yellow-100 text-yellow-800 p-2 text-center font-semibold">
      {{ $message }}
    </div>
    @endif

    <!-- Logo -->
    <div class="flex justify-center items-center py-2">
      <a href="https://www.prarang.in" target="_blank">
        <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Prarang Logo" class="h-8" />
      </a>
    </div>

    <!-- Content Wrapper -->
    <div class="flex flex-col md:flex-row relative">

      <!-- Information Section -->
      <div class="p-2 flex-1 space-y-2">
        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $user->name ?? 'User' }} prarang page</h3>

        <!-- Business Info -->
        <div class="space-y-1 mb-2">
          <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <i class="bx bxs-user text-gray-600 w-5 h-5"></i>
            <span class="text-gray-500 text-sm">नाम (Name):</span>
            <span class="text-gray-700 font-semibold">
              {{ $user->name ?? 'Not Available' }}
              {{ $user->surname ?? 'Not Available' }}
            </span>
          </div>

          @if (!empty($user->email))
          <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <i class="bx bxs-envelope text-gray-600 w-5 h-5"></i>
            <span class="text-gray-500 text-sm">ईमेल (Email):</span>
            <span class="text-gray-700 font-semibold">{{ $user->email }}</span>
          </div>
          @endif

          <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <i class="bx bxs-phone text-gray-600 w-5 h-5"></i>
            <span class="text-gray-500 text-sm">फ़ोन (Phone):</span>
            <span class="text-gray-700 font-semibold">{{ $user->phone }}</span>
          </div>

          <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <i class="bx bxs-category text-gray-600 w-5 h-5"></i>
            <span class="text-gray-500 text-sm">श्रेणी (Category):</span>
            <span class="text-gray-700 font-semibold">{{ $category->name }}</span>
          </div>
        </div>

        @if (!empty($user->address))
        <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
          <i class="bx bxs-location-plus text-gray-600 w-5 h-5"></i>
          <span class="text-gray-700">पता (Address):</span>
          <span class="text-gray-600">
            {{ $user->address->area_name ?? 'Area not available' }},
            {{ $user->address->city->name ?? 'City not available' }},
            {{ $user->address->postal_code  }}
          </span>
        </div>
        @endif

        @if (!empty($vcard->dynamicFields))
        <div class="text-lg font-semibold text-gray-800 mt-2 mb-1">
          सोशल मीडिया (Social Media)
        </div>
        @foreach ($vcard->dynamicFields as $social)
          <div class="p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <span class="text-gray-500 text-sm">
             {{ $social->title ?? 'सोशल मीडिया (Social Media)' }}:   <span class="text-gray-700 font-semibold">{{ $social->data ?? 'Not Available' }}</span>
            </span>
          </div>
        @endforeach
      @endif
      </div>

      <!-- Profile & QR Code -->
      <div class="bg-gradient-to-b from-indigo-50 to-white p-3 flex flex-col items-center justify-between md:w-64">
        <div class="relative mb-2">
          <div class="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden ring-4 ring-white shadow-lg">
            @if (!empty($user->profile) && Storage::exists($user->profile))
            <img src="{{ Storage::url($user->profile) }}" alt="{{ $user->name ?? 'User' }}'s Profile"
              class="w-full h-full object-cover" />
            @else
            <img src="https://via.placeholder.com/150" alt="Default Profile" class="w-full h-full object-cover" />
            @endif
          </div>
        </div>
        <div class="w-24 h-24 md:w-32 md:h-32 bg-white p-1 rounded-xl shadow-lg transform hover:rotate-3 transition-transform duration-300">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
            alt="QR Code" class="w-full h-full" />
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="border-t border-gray-100 p-2 space-y-2">
      <button onclick="shareVCard()"
        class="flex items-center justify-center space-x-2 p-2 bg-green-500 text-white hover:bg-green-600 w-full rounded-lg transition-colors">
        <i class="bx bx-share-alt"></i><span>शेयर करें</span>
      </button>

      <a href="{{ route('vCard.business-listing-register')}}"
        class="flex items-center justify-center space-x-2 p-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 w-full rounded-lg transition-colors">
        <i class="bx bx-link-external"></i><span>व्यवसाय पंजीकृत करें</span>
      </a>
    </div>

    <!-- Share Function -->
    <script>
      function shareVCard() {
        if (navigator.share) {
          navigator.share({
              title: '{{ $user->name ?? "VCard" }}',
              text: 'देखें {{ $user->name ?? "VCard" }} का व्यवसाय कार्ड',
              url: '{{ route("vCard.share", ["slug" => $vcard->slug]) }}'
            })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing:', error));
        } else {
          alert('Sharing not supported on this device');
        }
      }
    </script>

  </div>

</body>

</html>
