<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Business vCard for {{ $user->name ?? 'User' }}">
  <title>V Card</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    /* Text */
.max-w-xl .items-center .text-lg{
 font-weight:700;
 font-size:22px;
}
/* Linkx */
.linkx{
 font-weight:700;
 margin-top:0px !important;
}

/* Paragraph */
.justify-between div p{
 font-size:13px;
 text-shadow:none !important;
}



.max-w-xl .flex-col h2.font-semibold{
 text-shadow:rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px;
}

/* Paragraph */
.max-w-xl .flex-col p{
 text-shadow:rgb(0, 0, 0) 0px 1px 1px, rgb(0, 0, 0) 0px -1px 1px, rgb(0, 0, 0) 1px 0px 1px, rgb(0, 0, 0) -1px 0px 1px;
}
</style>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

  <!-- Business Card Container -->
  <div class="bg-white shadow-lg border border-gray-200 rounded-lg overflow-hidden w-full max-w-xl flex flex-row">

    <!-- Left Section (Profile & QR) -->
    <div class="w-1/3 bg-gradient-to-r from-indigo-500 to-purple-500 p-6 text-center flex flex-col justify-center items-center" style="background:{{ $vcard->color_code ?? 'black' }}">
      <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg">
        <img src="{{ $user->profile ? Storage::url($user->profile) : 'https://via.placeholder.com/150' }}"
             alt="{{ $user->name ?? 'User' }}'s Profile" class="w-full h-full object-cover">
      </div>
      <h2 class="text-white text-xl font-semibold mt-3">{{ ucfirst($user->name ?? 'User') }} {{ ucfirst($user->surname ?? '') }}</h2>
      <p class="text-white text-sm opacity-80">+91-{{ $user->phone ?? 'Category' }}</p>

      <!-- QR Code -->
      <div class="mt-4 w-24 h-24 bg-gray-100 p-2 rounded-lg shadow-md">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
             alt="QR Code" class="w-full h-full">
      </div>
    </div>

    <!-- Right Section (Contact & Social) -->
    <div class="w-2/3 p-6  flex flex-col justify-between">

      <!-- Contact Details -->
      <div class="">
        @if (!empty($user->name))
        <div class="flex items-center space-x-3">
          <i class="bx bxs-user text-blue-500 text-xl"></i>
          <span class="text-gray-700  text-lg"> {{ ucfirst($user->name ?? '') }} {{ ucfirst($user->surname ?? '') }}</span>
        </div>
        @endif
        <br>
        @if (!empty($user->email))
        <div class="flex items-center space-x-3">
          <i class="bx bxs-envelope text-indigo-500 text-xl"></i>
          <span class="text-gray-700">{{ $user->email }}</span>
        </div>
        @endif

        <div class="flex items-center space-x-3">
          <i class="bx bxs-phone text-green-500 text-xl"></i>
          <span class="text-gray-700">{{ $user->phone }}</span>
        </div>

        @if (!empty($user->address))
        <div class="flex items-center space-x-3">
          <i class="bx bxs-map text-red-500 text-xl"></i>
          <span class="text-gray-700">{{ $user->address->area_name ?? '' }}, {{ $user->address->city->name ?? '' }}, {{ $user->address->postal_code }}</span>
        </div>
        @endif
      </div>

      <!-- Social Media -->
      @if (!empty($vcard->dynamicFields))
      <div>
        <hr>
        <h3 class="text-md font-semibold  text-gray-800">सोशल मीडिया</h3>
        <div class="mt-2">
          @foreach ($vcard->dynamicFields as $social)
          <div class="flex items-center space-x-3">
            <i class="{{ $social->icon ?? 'bx bx-link' }} text-xl text-blue-500"></i>
            <span>
              @php $socialData = $social->data; @endphp
              @if (filter_var($socialData, FILTER_VALIDATE_URL))
              <a href="{{ $socialData }}" target="_blank" class="text-blue-600 hover:underline">{{ $socialData }}</a>
              @elseif (preg_match('/^\+?[0-9]{10,15}$/', $socialData))
              <a href="https://wa.me/{{ $socialData }}" target="_blank" class="text-green-600 hover:underline">{{ $socialData }}</a>
              @else
              {{ $socialData }}
              @endif
            </span>
          </div>
          @endforeach
          <hr>
          <p class="text-sm mt-2 text-center linkx">{{url()->current()}}</p>
        </div>
      </div>
      @endif

      <!-- Share Button -->
      @if ($vcard->is_active == 1)
      <button onclick="shareVCard()" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 w-full">
        <i class="bx bx-share-alt"></i> शेयर करें
      </button>
      @endif
    </div>
  </div>

  <!-- Share Function -->
  <script>
    function shareVCard() {
      const shareData = {
        title: "{{ $user->name ?? 'VCard' }}",
        text: " ",
        url: "{{ route('vCard.view', ['city_arr'=>$city_arr,'slug' => $vcard->slug]) }}"
      };

      if (navigator.share) {
        navigator.share(shareData)
          .then(() => console.log("Shared successfully!"))
          .catch(error => console.error("Sharing failed:", error));
      } else {
        alert("Sharing is not supported on this device.");
      }
    }
  </script>

</body>
</html>
