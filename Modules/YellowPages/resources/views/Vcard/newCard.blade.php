@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Prarang WebPage')
@section('content')


<div class="mt-9">
    <!-- Content Wrapper -->
    <div class="flex flex-col md:flex-row relative max-w-md mx-auto border border-gray-300 rounded-lg shadow-md p-4 bg-white">
        
        <!-- Information Section -->
        <div class="flex-1 space-y-2">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $user->name ?? 'User' }} Prarang Page</h3>

            <!-- Business Info -->
            <div class="space-y-1 mb-2">
                <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="bx bxs-user text-gray-600 w-5 h-5"></i>
                    <span class="text-gray-500 text-sm">नाम (Name):</span>
                    <span class="text-gray-700 font-semibold">
                        {{ $user->name ?? 'Not Available' }} {{ $user->surname ?? '' }}
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
            </div>

            @if (!empty($user->address))
            <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="bx bxs-location-plus text-gray-600 w-5 h-5"></i>
                <span class="text-gray-700">पता (Address):</span>
                <span class="text-gray-600">
                    {{ $user->address->area_name ?? 'Area not available' }},
                    {{ $user->address->city->name ?? 'City not available' }},
                    {{ $user->address->postal_code }}
                </span>
            </div>
            @endif
        </div>

        <!-- Profile & QR Code Section -->
        <div class="border border-gray-300 bg-gradient-to-b from-indigo-50 to-white p-3 flex flex-col items-center justify-between md:w-64 rounded-lg shadow-sm">
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
        </div>
    </div>

    <!-- Buttons -->
    <div class="border-t border-gray-100 p-2 space-y-2">
        <a href="{{ route('vCard.business-listing-register')}}"
        class="flex items-center justify-center space-x-2 p-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 w-full rounded-lg transition-colors">
        <i class="bx bx-link-external"></i><span>व्यवसाय पंजीकृत करें</span>
        </a>
    </div>
</div>

@endsection
