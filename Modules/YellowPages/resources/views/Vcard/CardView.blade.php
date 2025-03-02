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
/* Social icones */
.justify-between div .social-icones{
 display:flex;
 flex-direction:row;
 justify-content:flex-start;
 align-items:center;
 margin-top:6px;
}

/* Italic Tag */
.justify-between a i{
 display:flex;
 justify-content:center;
 align-items:center;
 padding-left:5px;
 padding-right:5px;
 padding-top:5px;
 padding-bottom:5px;
 border-style:solid;
 border-width:1px;
 border-color:#412929;
 margin-right:12px;
 border-top-left-radius:50%;
 border-top-right-radius:50%;
 border-bottom-left-radius:50%;
 border-bottom-right-radius:50%;
}

/* Paragraph */
.justify-between div p{
 margin-top:7px !important;
}
@media print {
    body * {
      visibility: hidden;
    }
    #my-vcard, #my-vcard * {
      visibility: visible;
    }

  }
</style>
<body >

<section class="flex items-center justify-center p-4" style="height: 70vh;">
  <div id="my-vcard" class="flex flex-row w-full max-w-xl overflow-hidden bg-white border border-gray-200 rounded-lg shadow-lg">

    <!-- Left Section (Profile & QR) -->
    <div class="flex flex-col items-center justify-center w-1/3 p-6 text-center bg-gradient-to-r from-indigo-500 to-purple-500" style="background:{{ $vcard->color_code ?? 'black' }}">
      <div class="w-32 h-32 overflow-hidden border-4 border-white rounded-full shadow-lg">
        <img src="{{ $user->profile ? Storage::url($user->profile) : 'https://via.placeholder.com/150' }}"
             alt="{{ $user->name ?? 'User' }}'s Profile" class="object-cover w-full h-full">
      </div>
      <h2 class="mt-3 text-xl font-semibold text-white">{{ ucfirst($user->name ?? 'User') }} {{ ucfirst($user->surname ?? '') }}</h2>
      <p class="text-sm text-white opacity-80">+91-{{ $user->phone ?? 'Category' }}</p>

      <!-- QR Code -->
      <div class="w-24 h-24 p-2 mt-4 bg-gray-100 rounded-lg shadow-md">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.scan', ['slug' => $vcard->slug]) }}"
             alt="QR Code" class="w-full h-full">
      </div>
    </div>

    <!-- Right Section (Contact & Social) -->
    <div class="flex flex-col justify-between w-2/3 p-6">

      <!-- Contact Details -->
      <div class="">
        @if (!empty($user->name))
        <div class="flex items-center space-x-3">
          <i class="text-xl text-blue-500 bx bxs-user"></i>
          <span class="text-lg text-gray-700"> {{ ucfirst($user->name ?? '') }} {{ ucfirst($user->surname ?? '') }}</span>
        </div>
        @endif
        <br>
        @if (!empty($user->email))
        <div class="flex items-center space-x-3">
          <i class="text-xl text-indigo-500 bx bxs-envelope"></i>
          <span class="text-gray-700">{{ $user->email }}</span>
        </div>
        @endif

        <div class="flex items-center space-x-3">
          <i class="text-xl text-green-500 bx bxs-phone"></i>
          <span class="text-gray-700">{{ $user->phone }}</span>
        </div>

        @if (!empty($user->address))
        <div class="flex items-center space-x-3">
          <i class="text-xl text-red-500 bx bxs-map"></i>
          <span class="text-gray-700">{{ $user->address->area_name ?? '' }}, {{ $user->address->city->name ?? '' }}, {{ $user->address->postal_code }}</span>
        </div>
        @endif
      </div>

      <!-- Social Media -->
      @if (!empty($vcard->dynamicFields))
      <div>
        <hr>
        <h3 class="font-semibold text-gray-800 text-md">सोशल मीडिया</h3>
            <div class="social-icones">
                <div class="social-icon">
                    <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-facebook"></i></a>
                </div>
                <div class="social-icon">
                    <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-instagram"></i></a>
                </div>
                <div class="social-icon">
                    <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-twitter"></i></a>
                </div>
                <div class="social-icon">
                    <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>



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
          <p class="mt-2 text-sm text-center linkx">{{url()->current()}}</p>
        </div>
      </div>
      @endif

      <!-- Share Button -->
      @if ($vcard->is_active == 1)
      <button onclick="shareVCard()" class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded-lg hover:bg-green-600">
        <i class="bx bx-share-alt"></i> शेयर करें
      </button>
      @endif
    </div>
  </div>
</section>
<section class="flex flex-wrap">
    <div class="w-full sm:w-1/4"></div>
    <div class="w-full text-right sm:w-1/2">
        <button class="px-4 py-2 mt-4 text-white bg-red-500 rounded-lg hover:bg-red-600"><i class="bx bx-window"></i> अपने व्यवसाय जोड़े </button>

        <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-lg hover:bg-green-600"><i class="bx bx-share-alt"></i> साझा करे </button>
        <button class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600" onclick="window.print()"><i class="bx bx-printer"></i> छापे</button>

    </div>
    <div class="w-full sm:w-1/4"></div>
</section>


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

