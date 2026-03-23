@if($type === 'country')
@php
$zoneName = $group;
$modalId = str_replace(' ', '', $zoneName) . 'ZoneModal';
$accordionId = 'accordion' . str_replace(' ', '', $zoneName);
@endphp
<div class="modal fade text-dark" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $zoneName }} Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="{{ $accordionId }}">
                    @foreach ($state as $states)
                    @php
                    $stateCollapseId = 'collapse' . str_replace(' ', '', $zoneName) . $states['state_code'];
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $states['state_code'] }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#{{ $stateCollapseId }}" aria-expanded="false"
                                aria-controls="{{ $stateCollapseId }}">
                                {{ $states['state_ut'] }}
                            </button>
                        </h2>
                        <div id="{{ $stateCollapseId }}" class="accordion-collapse collapse"
                            data-bs-parent="#{{ $accordionId }}" aria-labelledby="heading{{ $states['state_code'] }}">
                            <div class="accordion-body"
                                style="display: block !important; visibility: visible !important; opacity: 1 !important;">
                                <div class="row g-2">
                                    @foreach ($cities[$states['state_code']] as $city)
                                    <div class="col-6 col-md-4 col-lg-6">
                                        <a target="_blank" href="https://g2c.prarang.in/ai/{{ $city['city'] }}"
                                            class="btn btn-outline-primary btn-sm w-100 py-2 rounded-pill fw-medium text-truncate"
                                            style="font-size: 0.85rem; border: 1px solid #cbd5e1; color: #475569; display: block; background-color: white;">
                                            {{ $city['city'] }}
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@else
@php
$id = 'item-' . md5($group['name']);
@endphp
<div class="accordion-item mb-2 border shadow-sm" style="border-radius: 12px !important; overflow: visible;">
    <h2 class="accordion-header" id="heading-{{ $id }}">
        <button class="accordion-button collapsed p-3 bg-white shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse-{{ $id }}" aria-expanded="false" aria-controls="collapse-{{ $id }}"
            style="border-radius: 12px !important; transition: background 0.2s; border: none;">
            <div class="text-start">
                <span class="d-block fw-bold text-dark" style="font-size: 1.1rem; line-height: 1.2;">{{ $group['name']
                    }}</span>

            </div>
        </button>
    </h2>
    <div id="collapse-{{ $id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $id }}"
        data-bs-parent="#{{ $type }}Accordion">
        <div class="accordion-body p-3 bg-white border-top"
            style="display: block !important; visibility: visible !important; opacity: 1 !important;">
            <div class="row g-2">
                @foreach ($group['items'] as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <a target="_blank"
                        href="https://g2c.prarang.in/ai/{{ urlencode($type === 'india' ? $item['city_slug'] : $item['country_slug']) }}"
                        class="btn btn-outline-primary btn-sm w-100 py-2 rounded-pill fw-medium text-truncate"
                        style="font-size: 0.85rem; border: 1px solid #cbd5e1; color: #475569; display: block; background-color: white;">
                        {{ $type === 'india' ? $item['city'] : $item['country'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<style>
    .accordion-button:not(.collapsed) {
        background-color: #f8fafc !important;
        color: #1d4ed8 !important;
        box-shadow: none !important;
    }

    .accordion-button::after {
        background-size: 1.25rem;
    }
</style>
