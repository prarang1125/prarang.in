<x-partners.city-village-frame>
    @if($step == 5)
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-blue-600 border-b-2 border-blue-600 pb-1 inline-block mb-0">
            3 Estimated Budget

        </p>

    </div>
    @endsection
    @endif
    @if($step == 6)
    @section('p-header')
    <div class="text-center space-y-2">
        <p class="text-xl font-semibold text-green-600 border-b-2 border-green-600 pb-1 inline-block mb-0">
            4 Prarang Enrollment
        </p>
    </div>
    @endsection
    @endif
</x-partners.city-village-frame>
