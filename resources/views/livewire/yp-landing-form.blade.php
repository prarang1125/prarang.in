<div>
    <style>
        /* Name */
#name{
 padding-bottom:0px;
}

/* Input */
input{
 padding-left:11px !important;
 padding-top:10px;
 padding-bottom:10px !important;
}


    </style>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">पूरा नाम</label>
            <input type="text" wire:model="name" id="name" class="mt-1 block w-full border-gray-300 shadow-sm" >
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">ईमेल पता</label>
            <input type="email" wire:model="email" id="email" class="mt-1 block w-full border-gray-300 shadow-sm" >
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="mobile" class="block text-sm font-medium text-gray-700">मोबाइल नंबर</label>
            <input type="tel" wire:model="mobile" id="mobile" class="mt-1 block w-full border-gray-300 shadow-sm" >
            @error('mobile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-yellow-500 text-white py-3 px-4 rounded-md hover:bg-yellow-600">
            संपर्क करे
        </button>
    </form>
</div>
