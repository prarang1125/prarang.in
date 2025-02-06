<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    @if(isset($message))
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">सूचना</h1>
            <p class="text-lg text-gray-700">{{ $message }}</p>
        </div>
    </div>
@else

    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-xl w-full transform hover:scale-[1.02] transition-transform duration-300">
            <div class="flex flex-col md:flex-row">
                <div class="p-4 flex-1 relative space-y-3">
                    <div class="absolute top-0 left-0 w-24 h-24 bg-indigo-100 rounded-br-full opacity-50"></div>
                    <div class="relative">
                        <!-- Title with User's Name -->
                        <h1 class="text-2xl font-bold text-gray-800 mb-3">{{ $user->name }} prarang page</h1>
                        <!-- Contact Information -->
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                <i class="bx bxs-envelope text-gray-600 w-5 h-5"></i><span class="text-gray-700"><strong>नाम (Name):</strong> {{ trim(($user->name ?? '') . ' ' . ($user->surname ?? '')) ?: 'Not Available' }}
                                </span>
                            </div>
                            @if ($user->email)
                                <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <i class="bx bxs-envelope text-gray-600 w-5 h-5"></i><span class="text-gray-700"><strong>ईमेल(Email):</strong> {{ $user->email }}</span>
                                </div>
                            @endif
                            <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                <i class="bx bxs-phone text-gray-600 w-5 h-5"></i><span class="text-gray-700 text-sm"><strong>फ़ोन(Phone):</strong> {{ $user->phone ?? 'Not Available' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                <i class="bx bxs-category text-gray-600 w-5 h-5"></i><span class="text-gray-700"><strong>श्रेणी(Category):</strong> {{ $category ?? 'Not Available' }}</span>
                            </div>
                            <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                <i class="bx bxs-map text-gray-600 w-5 h-5"></i><span class="text-gray-700"><strong>पता(Address):</strong> {{ $address->street ?? 'Not Available' }} {{ $address->area_name ?? '' }} {{ $address->city_id->cityname ?? '' }} {{ $address->postal_code ?? '' }}</span>
                            </div>
                            @if (!empty($vcard->dynamicFields))
                            <div class="text-lg font-semibold text-gray-800 mt-4 mb-2">
                                सोशल मीडिया (Social Media)
                            </div>
                            @foreach ($vcard->dynamicFields as $social)
                                <div class="p-2 hover:bg-gray-50 rounded-lg transition-colors">
                                    <span class="text-gray-700">
                                        <strong>{{ $social->title ?? 'सोशल मीडिया (Social Media)' }}:</strong> {{ $social->data ?? 'Not Available' }}
                                    </span>
                                </div>
                            @endforeach
                        @endif                             
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                      
                    
                        <!-- Facebook Share -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm">
                            <i class="bx bxl-facebook"></i>
                        </a>
                    
                        <!-- WhatsApp Share -->
                        <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank" class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm">
                            <i class="bx bxl-whatsapp"></i>
                        </a>
                    
                        <!-- Instagram (Not for sharing, just profile link example) -->
                        <a href="https://www.instagram.com/your_username" target="_blank" class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    
                        <!-- LinkedIn Share -->
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm">
                            <i class="bx bxl-linkedin"></i>
                        </a>
                    </div>
                    
                </div>
                <div class="bg-gradient-to-b from-indigo-50 to-white p-6 flex flex-col items-center justify-between md:w-64">
                    <div class="relative mb-4">
                        <div class="w-32 h-32 rounded-full overflow-hidden ring-4 ring-white shadow-lg">
                            <!-- Profile Image -->
                            @if ($user->profile)
                                <img src="{{ Storage::url($user->profile) }}" alt="Photo" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="absolute -bottom-2 -right-2">
                            <div class="bg-indigo-600 text-white p-2 rounded-full"><i class="bx bx-check"></i></div>
                        </div>
                    </div>
                    <div class="w-32 h-32 bg-white p-3 rounded-xl shadow-lg transform hover:rotate-3 transition-transform duration-300">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ route('vCard.view', ['slug' => $user->name]) }}&bgcolor=fff&color=4338ca" alt="QR Code" class="w-full h-full">
                    </div>                    
                </div>
            </div>
            @endif
            <div class="border-t border-gray-100">
                <a href="{{ route('vCard.business-listing-register')}}" class="flex items-center justify-center space-x-2 p-4 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 transition-colors">
                    <i class="bx bx-link-external"></i><span>व्यवसाय देखें</span>
                </a>
            </div>
        </div>
    </div>
   
</body>

</html>
