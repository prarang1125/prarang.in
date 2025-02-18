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
<body>
  <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-4">
    <!-- Card Container: Slightly larger with max-w-md, outer highlight border added -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-md w-full transform hover:scale-105 transition-transform duration-300 ring-2 ring-indigo-400 hover:ring-4 hover:ring-indigo-500">
      
      <!-- Logo Section -->
      <div class="flex justify-center items-center py-3">
        <a href="https://www.prarang.in" target="_blank">
          <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Prarang Logo" class="h-6" />
        </a>
      </div>
      
      <!-- Main Content -->
      <div class="flex flex-col md:flex-row relative">
        
        <!-- Left Section: Business & Contact Information -->
        <div class="p-3 flex-1 space-y-2">
          <h3 class="text-xl font-bold text-gray-800 mb-2">
            {{ $user->name ?? 'User' }} prarang page
          </h3>

          <!-- Business Information Fields -->
          <div class="space-y-1 mb-3">
            <div class="flex items-center space-x-2 p-1 hover:bg-gray-50 rounded transition-colors">
              <i class="bx bxs-user text-gray-600 w-4 h-4"></i>
              <span class="text-gray-500 text-xs">नाम (Name):</span>
              <span class="text-gray-700 font-semibold text-xs">
                {{ trim(($user->name ?? '') . ' ' . ($user->surname ?? '')) ?: 'Not Available' }}
              </span>
            </div>
            @if (!empty($user->email))
              <div class="flex items-center space-x-2 p-1 hover:bg-gray-50 rounded transition-colors">
                <i class="bx bxs-envelope text-gray-600 w-4 h-4"></i>
                <span class="text-gray-500 text-xs">ईमेल (Email):</span>
                <span class="text-gray-700 font-semibold text-xs">{{ $user->email }}</span>
              </div>
            @endif
            <div class="flex items-center space-x-2 p-1 hover:bg-gray-50 rounded transition-colors">
              <i class="bx bxs-phone text-gray-600 w-4 h-4"></i>
              <span class="text-gray-500 text-xs">फ़ोन (Phone):</span>
              <span class="text-gray-700 font-semibold text-xs">{{ $user->phone }}</span>
            </div>
            <div class="flex items-center space-x-2 p-1 hover:bg-gray-50 rounded transition-colors">
              <i class="bx bxs-category text-gray-600 w-4 h-4"></i>
              <span class="text-gray-500 text-xs">श्रेणी (Category):</span>
              <span class="text-gray-700 font-semibold text-xs">{{ $category->name }}</span>
            </div>
          </div>

          <!-- Address -->
          @if (!empty($user->address))
            <div class="flex items-center space-x-2 p-1 hover:bg-gray-50 rounded transition-colors">
              <i class="bx bxs-location-plus text-gray-600 w-4 h-4"></i>
              <span class="text-gray-700 text-xs">पता (Address):</span>
              <span class="text-gray-600 text-xs">
                {{ $user->address->area_name ?? 'Area not available' }},
                {{ $user->address->city->name ?? 'City not available' }},
                {{ $user->address->postal_code ?? 'Postal code not available' }}
              </span>
            </div>
          @endif

          <!-- Dynamic (Social Media) Fields -->
<<<<<<< HEAD
          <!-- Social Media Section -->
          @if (!empty($vcard->dynamicFields))
          <div class="text-lg font-semibold text-gray-800 mt-2 mb-1">
              सोशल मीडिया (Social Media)
          </div>
          @foreach ($vcard->dynamicFields as $social)
              <div class="p-2 hover:bg-gray-50 rounded-lg transition-colors">
                  <span class="text-gray-500 text-sm">
                      {{ $social->title ?? 'सोशल मीडिया (Social Media)' }}:
                      <span class="text-gray-700 font-semibold">
                          @if (!empty($social->data))
                              @php
                                  $socialData = $social->data;
                              @endphp
                              
                              @if (filter_var($socialData, FILTER_VALIDATE_URL))
                                  <!-- If it's a valid URL, make it a clickable link -->
                                  <a href="{{ $socialData }}" target="_blank" class="text-blue-500 hover:underline">{{ $socialData }}</a>
                              @elseif (preg_match('/^\+?[0-9]{10,15}$/', $socialData))
                                  <!-- If it's a valid phone number, make it a clickable link for WhatsApp -->
                                  <a href="https://wa.me/{{ $socialData }}" target="_blank" class="text-green-500 hover:underline">{{ $socialData }}</a>
                              @else
                                  <!-- If it's neither a URL nor a phone number, display it as plain text -->
                                  {{ $socialData }}
                              @endif
                          @else
                              <!-- If data is empty, show "Not Available" -->
                              Not Available
                          @endif
                      </span>
                  </span>
              </div>
          @endforeach
=======
          @if (!empty($vcard->dynamicFields))
            <div class="text-sm font-semibold text-gray-800 mt-2 mb-1">
              सोशल मीडिया (Social Media)
            </div>
            @foreach ($vcard->dynamicFields as $social)
              <div class="p-1 hover:bg-gray-50 rounded transition-colors">
                <span class="text-gray-700 text-xs">
                  <strong>{{ $social->title ?? 'सोशल मीडिया (Social Media)' }}:</strong>
                  {{ $social->data ?? 'Not Available' }}
                </span>
              </div>
            @endforeach
>>>>>>> 6c12e62f19621255c39c824489c6c88135c24d20
          @endif
        </div>
        
        <!-- Right Section: Profile Picture & QR Code -->
        <div class="bg-gradient-to-b from-indigo-50 to-white p-4 flex flex-col items-center justify-between md:w-28">
          <!-- Profile Picture -->
          <div class="relative mb-3">
            <div class="w-24 h-24 rounded-full overflow-hidden ring-4 ring-white shadow-md">
              @if (!empty($user->profile) && Storage::exists($user->profile))
                <img src="{{ Storage::url($user->profile) }}" alt="{{ $user->name ?? 'User' }}'s Profile"
                  class="w-full h-full object-cover" />
              @else
                <img src="https://via.placeholder.com/150" alt="Default Profile"
                  class="w-full h-full object-cover" />
              @endif
            </div>
          </div>
          <!-- QR Code -->
          <div class="w-24 h-24 bg-white p-2 rounded-xl shadow-md transform hover:rotate-3 transition-transform duration-300">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
              alt="QR Code" class="w-full h-full" />
          </div>
        </div>
      </div>

      <!-- Business Listing Button: Displayed Only When Listings Exist -->
      @if($businessListings->isNotEmpty())
        <div class="border-t border-gray-100 p-3">
          <a href="{{ route('yp.home') }}"
             class="flex items-center justify-center space-x-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 p-3 rounded-lg transition-colors">
            <i class="bx bx-link-external"></i>
            <span>व्यवसाय देखे</span>
          </a>
        </div>
      @endif
      
    </div>
  </div>
</body>
</html>
