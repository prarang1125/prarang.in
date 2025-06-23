<div wire:init="loadServices">
    @if($loading)
    <div class="my-5 d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    @else
    <div class="content">
        {{ $deepseekResponse }}
    </div>
    @endif
</div>
