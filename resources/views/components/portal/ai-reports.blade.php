@props(['primary', 'secondary', 'cities', 'zone'])

<section class="p-2 pt-1 shadow bg-light mt-3">
    <h5 class="p-0 m-0 text-center">AI Reports</h5>
    <div class="row">
        <div class="col-sm-6">
            <a href="#" class="btn btn-primary btn-sm w-100 fw-semibold" data-bs-toggle="modal"
                data-bs-target="#czechRegionsModal">
                <i class="fa fa-robot me-1"></i>
                {{ $primary->country_name ?? 'Country' }} AI Report
            </a>
        </div>
        <div class="col-sm-6">
            <a href="#" class="btn btn-primary btn-sm w-100 fw-semibold" data-bs-toggle="modal"
                data-bs-target="#indiaRegionsModal">
                <i class="fa fa-robot me-1"></i>
                {{ $secondary->country_name ?? 'Country' }} AI Report
            </a>
        </div>
    </div>
</section>

<!-- Czech Regions Modal -->
<style>
    #czechRegionsModal {
        z-index: 1055 !important;
    }

    #czechRegionsModal .modal-dialog {
        z-index: 1056 !important;
    }

    .modal-backdrop {
        z-index: 1050 !important;
    }

    .region-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
        padding: 10px;
    }

    .region-box {
        background-color: #2196F3;
        color: white;
        padding: 25px 15px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80px;
        font-weight: 500;
    }

    .region-box a {
        color: white;
        text-decoration: none;
    }

    .region-box:hover {
        background-color: #1976D2;
    }

    @media (max-width: 768px) {
        .region-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 480px) {
        .region-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Region box */
    #czechRegionsModal .modal-body .region-box {
        min-width: 0px;
        min-height: 130px;
    }

    /* Region grid */
    #indiaRegionsModal .modal-body .region-grid {

        justify-content: center;
        align-content: center;
    }

    /* Region grid */
    #indiaRegionsModal .modal-body .region-grid:nth-child(6) {
        display: flex;
    }

    /* Region box */
    #indiaRegionsModal .modal-dialog .modal-content .modal-body .text-center .region-grid:nth-child(6) .region-box:nth-child(2) {
        width: 20% !important;
    }



    /* Region box */
    #czechRegionsModal .modal-body .region-box {
        background-color: #0d6efd;
    }

    /* Link (hover) */
    #czechRegionsModal .modal-body a:hover {
        font-weight: 600;
    }

    /* Region box */
    #indiaRegionsModal .modal-body .region-box {
        min-height: 130px;
        background-color: #0d6efd !important;
    }

    /* Link (hover) */
    #indiaRegionsModal .modal-body a:hover {
        font-weight: 600;
    }

    /* Text primary */
    #indiaRegionsModal .modal-body p.text-primary {
        margin-top: 2px !important;
        margin-bottom: 1px !important;
    }

    /* Paragraph */
    #indiaRegionsModal .modal-dialog .position-relative .modal-body .text-center p {
        margin-bottom: 5px !important;
    }



    /* Region box */
    #czechRegionsModal .modal-body .region-box {
        background-color: #0d6efd;
    }

    /* Link (hover) */
    #czechRegionsModal .modal-body a:hover {
        font-weight: 600;
    }

    /* Region box */
    #indiaRegionsModal .modal-body .region-box {
        min-height: 130px;
        background-color: #0d6efd !important;
    }

    /* Link (hover) */
    #indiaRegionsModal .modal-body a:hover {
        font-weight: 600;
    }

    /* Text primary */
    #indiaRegionsModal .modal-body p.text-primary {
        margin-top: 2px !important;
        margin-bottom: 1px !important;
    }

    /* Paragraph */
    #indiaRegionsModal .modal-dialog .position-relative .modal-body .text-center p {
        margin-bottom: 5px !important;
    }


    /* Region box */
    #indiaRegionsModal .modal-body .region-box {
        background-color: #0d6efd;
    }

    /* Analytics box */
    .modal-body .analytics-box {
        transform: translatex(0px) translatey(0px);
        padding-top: 8px;
        padding-bottom: 8px;
        min-height: 30px;
        background-color: #0d6efd;
    }

    /* Analytics box */
    .modal-body .analytics-box:nth-child(7) {
        min-height: 119px;
        background-color: #0d6efd;
    }

    .accordion-body a {
        color: #2f2e2c !important;
    }

    .accordion-body a:hover {
        color: #2f2e2c !important;
        font-weight: 700;
    }

    /* Flex column */
    #indiaRegionsModal .modal-body .flex-column {
        display: grid;
        flex-direction: row !important;
    }

    /* Flex column */
    #indiaRegionsModal .modal-dialog .position-relative .modal-body .text-center .flex-column {
        grid-template-columns: 20% 50% 20fr !important;
    }

    /* Region box */
    .flex-column div .region-box {
        width: 134px;
        position: relative;
        left: 16px;
    }

    /* Region box */
    #indiaRegionsModal .flex-column .region-box:nth-child(3) {
        margin-top: 41px;
        margin-left: 56px;
        margin-right: 16px;
    }
</style>
<div class="modal fade" id="czechRegionsModal" tabindex="-1" aria-labelledby="czechRegionsModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                aria-label="Close" style="z-index: 10;"></button>
            <div class="modal-body pt-5">
                <div class="text-center">
                    <strong class="text-primary fs-5">Czech Republic AI Reports</strong>
                    <p class="mt-2 mb-3">The Czech Republic is divided into 14 regions, including Prague City, which
                        falls within Central Bohemia.</p>
                    <div class="region-grid">
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/prague-and-central-bohemia">Prague and
                                Central Bohemia</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/south-bohemia">South
                                Bohemia</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/pilsen">Pilsen</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/south-moravia">South
                                Moravia</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/vysocina">Vysocina</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/moravia--silesia">Moravia-Silesia</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/usti-nad-labem">Usti nad
                                Labem</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/olomouc">Olomouc</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/hradec-kralove">Hradec
                                Kralove</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/pardubice">Pardubice</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/zlin">Zlin</a></div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/karlovy-vary">Karlovy Vary</a>
                        </div>
                        <div class="region-box"><a target="_blank"
                                href="https://g2c.prarang.in/czech-republic/liberec">Liberec</a></div>
                        <div class="region-box"><a target="_blank" href="https://g2c.prarang.in/Czech Republic">Czech
                                Republic</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Move modals to body
        var modalIds = ['czechRegionsModal', 'indiaRegionsModal', 'NorthZoneModal', 'SouthZoneModal',
            'WestZoneModal', 'EastZoneModal', 'CentralZoneModal', 'NortheastZoneModal', 'UTZoneModal'
        ];
        modalIds.forEach(function(id) {
            var modal = document.getElementById(id);
            if (modal) {
                document.body.appendChild(modal);
            }
        });

        function openZoneModal(zoneId) {
            const indiaModalEl = document.getElementById('indiaRegionsModal');
            const indiaModal = bootstrap.Modal.getInstance(indiaModalEl) ||
                new bootstrap.Modal(indiaModalEl);

            const zoneModalEl = document.getElementById(zoneId);
            const zoneModal = new bootstrap.Modal(zoneModalEl);

            // Close India modal before opening zone modal
            indiaModal.hide();

            setTimeout(() => zoneModal.show(), 300);

            // Re-open India modal after zone closes
            zoneModalEl.addEventListener('hidden.bs.modal', () => {
                indiaModal.show();
            }, {
                once: true
            });
        }

        // Attach click handler to all zone buttons
        document.querySelectorAll("[data-zone-modal]").forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                const zoneId = btn.getAttribute("data-zone-modal");
                openZoneModal(zoneId);
            });
        });
    });
</script>

<!-- India Regions Modal -->
<div class="modal fade" id="indiaRegionsModal" tabindex="-1" aria-labelledby="indiaRegionsModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                aria-label="Close" style="z-index: 10;"></button>
            <div class="modal-body pt-5">
                <div class="text-center">
                    <strong class="text-primary fs-5">India AI Reports</strong>
                    <p class="mt-2 mb-3">768 District Capitals – Discover beyond 28 States & 8 UTs.</p>
                    <p class="text-primary fw-bold mb-2">28 States</p>
                    <div class="region-grid">
                        <div class="region-box"><a href="#" data-zone-modal="NorthZoneModal">North</a></div>
                        <div class="region-box"><a href="#" data-zone-modal="SouthZoneModal">South</a></div>
                        <div class="region-box"><a href="#" data-zone-modal="WestZoneModal">West</a></div>
                        <div class="region-box"><a href="#" data-zone-modal="EastZoneModal">East</a></div>
                        <div class="region-box"><a href="#" data-zone-modal="CentralZoneModal">Central</a>
                        </div>
                        <div class="region-box"><a href="#" data-zone-modal="NortheastZoneModal">Northeast</a>
                        </div>
                    </div>
                    <div class="text-center flex flex-column">
                        <div>
                            <p class="text-primary fw-bold mb-2 mt-4">8 Union Territories</p>
                            <div class="region-grid">
                                <div class="region-box" style="background-color: #6c757d;"><a href="#"
                                        data-zone-modal="UnionTerritoriesZoneModal">Union Territories</a></div>

                            </div>
                        </div>
                        <div></div>
                        <div class="region-box"><a target="_blank" href="https://g2c.prarang.in/ai/India">India</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($zone as $key => $z)
    <div class="modal fade text-dark" id="{{ str_replace(' ', '', $key) }}ZoneModal" tabindex="-1"
        aria-labelledby="{{ str_replace(' ', '', $key) }}ZoneModalLabel" aria-hidden="true" data-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="{{ str_replace(' ', '', $key) }}ZoneModalLabel">{{ $key }}
                        Zone</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-start" style="min-height:75vh">
                    <div class="accordion" id="accordion{{ str_replace(' ', '', $key) }}">

                        @foreach ($z as $states)
                            <div class="accordion-item">
                                <h2 class="accordion-header"><button class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $states['state_code'] }}">{{ $states['state_ut'] }}</button>
                                </h2>
                                <div id="collapse{{ $states['state_code'] }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion{{ str_replace(' ', '', $states['state_code']) }}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            @foreach ($cities[$states['state_code']] as $city)
                                                <div class="col-6"><a target="_blank"
                                                        href="https://g2c.prarang.in/ai/{{ $city['city'] }}">{{ $city['city'] }}</a>
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
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Move all modals to body to fix stacking context issues
        var modalIds = ['czechRegionsModal', 'indiaRegionsModal', 'NorthZoneModal', 'SouthZoneModal',
            'WestZoneModal', 'EastZoneModal', 'CentralZoneModal', 'NortheastZoneModal',
            'UnionTerritoriesZoneModal'
        ];
        modalIds.forEach(function(id) {
            var modal = document.getElementById(id);
            if (modal) {
                document.body.appendChild(modal);
            }
        });
    });
</script>
