@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Prarang WebPage')
@section('content')

<div class="fixed inset-0 flex items-center justify-center bg-gray-100">
    <!-- Content Wrapper -->
    <div class="flex flex-col md:flex-row relative max-w-md mx-auto rounded-lg shadow-md p-4 bg-white 
                border border-gray-300 hover:border-indigo-500 transition duration-300 ease-in-out">
        
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
            </div>

            <!-- Address Section -->
            <div class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg transition-colors">
                <i class="bx bxs-location-plus text-gray-600 w-5 h-5"></i>
                <span class="text-gray-700">पता (Address):</span>
                <span class="text-gray-600">
                    @if (!empty($user->address) && !empty($user->address->area_name) && !empty($user->address->city->name) && !empty($user->address->postal_code))
                        {{ $user->address->area_name }},
                        {{ $user->address->city->name }},
                        {{ $user->address->postal_code }}
                    @else
                        <span class="text-gray-500 font-semibold">?</span>
                    @endif
                </span>
            </div>
        </div>

        <!-- Profile & QR Code Section -->
        <div class="bg-gradient-to-b from-indigo-50 to-white p-3 flex flex-col items-center justify-between md:w-64 rounded-lg shadow-sm">
            <div class="relative mb-2">
                <div class="w-24 h-24 md:w-32 md:h-32 rounded-full overflow-hidden shadow-lg flex items-center justify-center bg-gray-200">
                    @if (!empty($user->profile) && Storage::exists($user->profile))
                        <img src="{{ Storage::url($user->profile) }}" alt="{{ $user->name ?? 'User' }}'s Profile"
                            class="w-full h-full object-cover" />
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-600 text-5xl font-bold rounded-full">
                            ?
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
