<!-- resources/views/components/ui/modal.blade.php -->
@props(['id'])

<!-- Trigger Button -->
<div onclick="openModal('{{ $id }}')" class="cursor-pointer w-full block">
    {{ $button ?? '' }}
</div>

<!-- Modal Backdrop + Container -->
<div id="{{ $id }}"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300"
    onclick="if(event.target === this) closeModal('{{ $id }}')">

    <!-- Modal Box -->
    <div
        class="relative bg-white rounded-lg shadow-xl w-full max-w-lg flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">

        <!-- Header -->
        <div
            class="flex-shrink-0 flex {{ isset($title) ? 'items-center justify-between px-6 py-4 border-b border-gray-200' : 'items-end justify-end px-4 pt-3' }}">

            @isset($title)
            <h3 class="text-lg font-semibold text-gray-900">
                {{ $title ?? 'Modal Title' }}
            </h3>
            @endisset

            <button onclick="closeModal('{{ $id }}')"
                class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Body (scrollable) -->
        <div class="flex-1 overflow-y-auto px-6 py-4">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div
            class="flex-shrink-0 flex items-center justify-end gap-2 px-6 py-3 border-t border-gray-200 bg-gray-50 rounded-b-lg">
            <button onclick="closeModal('{{ $id }}')"
                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded transition-colors text-sm">
                Close
            </button>
            {{ $footer ?? '' }}
        </div>

    </div>
</div>

@once
<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100', 'pointer-events-auto');
        modal.querySelector('.transform').classList.remove('scale-95');
        modal.querySelector('.transform').classList.add('scale-100');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('opacity-100', 'pointer-events-auto');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.querySelector('.transform').classList.remove('scale-100');
        modal.querySelector('.transform').classList.add('scale-95');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.fixed.z-50.opacity-100').forEach(function(modal) {
                closeModal(modal.id);
            });
        }
    });
</script>
@endonce
