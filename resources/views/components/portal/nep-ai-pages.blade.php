<div class="w-100">
    <style>
        .ai-modal-header {
            background: linear-gradient(90deg, #2563eb 0%, #4f46e5 100%);
            color: white;
            border: none;
        }

        .ai-modal-body {
            background-color: #f8fafc;
            max-height: 70vh;
            overflow-y: auto;
        }

        /* Button */
        #main .btn-primary {
            padding-top: 5px;
            padding-bottom: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>


    <button type="button" data-bs-toggle="modal" data-bs-target="#worldAiModal"
        class="w-100 text-cenetr py-1 btn-block bg-primary text-white rounded ">
        Other Countries
    </button>


    <!-- INDIA MODAL -->
    <div class="modal fade" id="indiaAiModal" tabindex="-1" aria-labelledby="indiaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 1.25rem;">
                <div class="modal-header ai-modal-header p-4">
                    <h5 class="modal-title fw-bold" id="indiaModalLabel">Countries </h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ai-modal-body p-4">
                    <div class="accordion" id="indiaAccordion">
                        @foreach ($indiaData as $group)
                        @include('components.portal.partials.country_accordian', [
                        'group' => $group,
                        'type' => 'india',
                        ])
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4 fw-medium" data-bs-dismiss="modal">बंद
                        करें</button>
                </div>
            </div>
        </div>
    </div>

    <!-- WORLD MODAL -->
    <div class="modal fade" id="worldAiModal" tabindex="-1" aria-labelledby="worldModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 1.25rem;">
                <div class="modal-header ">

                    <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ai-modal-body p-4">
                    <p class="text-center h4 text-primary">
                        World Encyclopedia
                    </p>
                    <div class="accordion" id="worldAccordion">
                        @foreach ($worldData as $group)
                        @include('components.portal.partials.country_accordian', [
                        'group' => $group,
                        'type' => 'world',
                        ])
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary px-4 fw-medium"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
