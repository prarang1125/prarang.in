@props(['primary', 'secondary'])

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


    /* #NorthZoneModal .modal-dialog, #SouthZoneModal .modal-dialog, #WestZoneModal .modal-dialog,
#EastZoneModal .modal-dialog, #CentralZoneModal .modal-dialog, #NortheastZoneModal .modal-dialog,
#UTZoneModal .modal-dialog {
    z-index: 1061 !important;
} */

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
                    <p class="text-primary fw-bold mb-2 mt-4">8 Union Territories</p>
                    <div class="region-grid">
                        <div class="region-box" style="background-color: #6c757d;"><a href="#"
                                data-zone-modal="UTZoneModal">Union Territories</a></div>
                        <div class="region-box"><a target="_blank" href="https://g2c.prarang.in/ai/India">India</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- North Zone Modal -->
<div class="modal fade text-dark" id="NorthZoneModal" tabindex="-1" aria-labelledby="NorthZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="NorthZoneModalLabel">North Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionNorth">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseHaryana">Haryana</button></h2>
                        <div id="collapseHaryana" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNorth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/195/Ambala">Ambala</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/196/Bhiwani">Bhiwani</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/197/Charkhi Dadri">Charkhi Dadri</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/198/Faridabad">Faridabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/199/Fatehabad">Fatehabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/200/Gurugram">Gurugram</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/201/Hisar">Hisar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/202/Jhajjar">Jhajjar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/203/Jind">Jind</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/204/Kaithal">Kaithal</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/205/Karnal">Karnal</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/206/Kurukshetra">Kurukshetra</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/207/Narnaul">Narnaul</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/208/Nuh">Nuh</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/209/Palwal">Palwal</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/210/Panchkula">Panchkula</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/211/Panipat">Panipat</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/212/Rewari">Rewari</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/213/Rohtak">Rohtak</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/214/Sirsa">Sirsa</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/215/Sonipat">Sonipat</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/216/Yamunanagar">Yamunanagar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseHP">Himachal Pradesh</button></h2>
                        <div id="collapseHP" class="accordion-collapse collapse" data-bs-parent="#accordionNorth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/217/Bilaspur (Bilaspur HP)">Bilaspur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/218/Chamba">Chamba</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/219/Hamirpur (Hamirpur HP)">Hamirpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/220/Dharamshala">Dharamshala</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/221/Reckong Peo">Reckong Peo</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/222/Kullu">Kullu</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/223/Keylong">Keylong</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/224/Mandi">Mandi</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/225/Shimla">Shimla</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/226/Nahan">Nahan</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/227/Solan">Solan</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/228/Una">Una</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsePunjab">Punjab</button></h2>
                        <div id="collapsePunjab" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNorth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/472/Amritsar">Amritsar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/473/Barnala">Barnala</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/474/Bathinda">Bathinda</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/475/Firozpur">Firozpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/476/Faridkot">Faridkot</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/477/Fatehgarh Sahib">Fatehgarh
                                            Sahib</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/478/Fazilka">Fazilka</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/479/Gurdaspur">Gurdaspur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/480/Hoshiarpur">Hoshiarpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/481/Jalandhar">Jalandhar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/482/Kapurthala">Kapurthala</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/483/Ludhiana">Ludhiana</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/484/Malerkotla">Malerkotla</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/485/Mansa">Mansa</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/486/Moga">Moga</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/487/Sri Muktsar Sahib">Sri Muktsar
                                            Sahib</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/488/Pathankot">Pathankot</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/489/Patiala">Patiala</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/490/Rupnagar">Rupnagar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/491/Mohali">Mohali</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/492/Sangrur">Sangrur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/493/Nawanshehr">Nawanshehr</a></div>
                                    <div class="col-6"><a target="_blank" href="/494/Tarn Taran Sahib">Tarn Taran
                                            Sahib</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseUttarakhand">Uttarakhand</button>
                        </h2>
                        <div id="collapseUttarakhand" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNorth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/688/Almora">Almora</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/689/Bageshwar">Bageshwar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/690/Gopeshwar">Gopeshwar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/691/Champawat">Champawat</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/692/Dehradun">Dehradun</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/693/Haridwar">Haridwar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/694/Nainital">Nainital</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/695/Pauri">Pauri</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/696/Pithoragarh">Pithoragarh</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/697/Rudraprayag">Rudraprayag</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/698/New Tehri">New Tehri</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/699/Rudrapur">Rudrapur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/700/Uttarkashi">Uttarkashi</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseUP">Uttar Pradesh</button></h2>
                        <div id="collapseUP" class="accordion-collapse collapse" data-bs-parent="#accordionNorth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/613/Agra">Agra</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/614/Aligarh">Aligarh</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/619/Ayodhya">Ayodhya</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/627/Bareilly">Bareilly</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/641/Noida">Noida</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/642/Ghaziabad">Ghaziabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/645/Gorakhpur">Gorakhpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/652/Jhansi">Jhansi</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/655/Kanpur">Kanpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/661/Lucknow">Lucknow</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/665/Mathura">Mathura</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/667/Meerut">Meerut</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/673/Allahabad">Prayagraj</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/687/Varanasi">Varanasi</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- South Zone Modal -->
<div class="modal fade text-dark" id="SouthZoneModal" tabindex="-1" aria-labelledby="SouthZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="SouthZoneModalLabel">South Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionSouth">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseAP">Andhra Pradesh</button></h2>
                        <div id="collapseAP" class="accordion-collapse collapse" data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/16/Vijayawada">Vijayawada</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/23/Tirupati">Tirupati</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/24/Visakhapatnam">Visakhapatnam</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/11/Guntur">Guntur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/14/Kurnool">Kurnool</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/27/Kadapa">Kadapa</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseKarnataka">Karnataka</button></h2>
                        <div id="collapseKarnataka" class="accordion-collapse collapse"
                            data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/257/Bengaluru (Bengaluru Urban)">Bengaluru</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/274/Mysore">Mysore</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/263/Mangalore">Mangalore</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/255/Belgaum">Belgaum</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/267/Kalaburagi">Kalaburagi</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/264/Davangere">Davangere</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseKerala">Kerala</button></h2>
                        <div id="collapseKerala" class="accordion-collapse collapse"
                            data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/296/Thiruvananthapuram">Thiruvananthapuram</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/291/Kozhikode">Kozhikode</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/285/Kakkanad">Kochi</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/295/Thrissur">Thrissur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/289/Kollam">Kollam</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/284/Alappuzha">Alappuzha</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTN">Tamil Nadu</button></h2>
                        <div id="collapseTN" class="accordion-collapse collapse" data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/536/Chennai">Chennai</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/537/Coimbatore">Coimbatore</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/547/Madurai">Madurai</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/560/Tiruchirappalli">Tiruchirappalli</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/556/Salem">Salem</a></div>
                                    <div class="col-6"><a target="_blank" href="/562/Tirunelveli">Tirunelveli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTelangana">Telangana</button></h2>
                        <div id="collapseTelangana" class="accordion-collapse collapse"
                            data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/575/Hyderabad (Hyderabad)">Hyderabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/574/Hanamkonda">Warangal</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/581/Karimnagar">Karimnagar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/594/Nizamabad">Nizamabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/582/Khammam">Khammam</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/585/Mahbubnagar">Mahbubnagar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseGoa">Goa</button></h2>
                        <div id="collapseGoa" class="accordion-collapse collapse" data-bs-parent="#accordionSouth">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/160/Panaji">Panaji</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/161/Margao">Margao</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- West Zone Modal -->
<div class="modal fade text-dark" id="WestZoneModal" tabindex="-1" aria-labelledby="WestZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="WestZoneModalLabel">West Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionWest">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseGujarat">Gujarat</button></h2>
                        <div id="collapseGujarat" class="accordion-collapse collapse"
                            data-bs-parent="#accordionWest">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/162/Ahmedabad">Ahmedabad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/190/Surat">Surat</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/193/Vadodara">Vadodara</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/188/Rajkot">Rajkot</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/174/Gandhinagar">Gandhinagar</a></div>
                                    <div class="col-6"><a target="_blank" href="/168/Bhavnagar">Bhavnagar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseMaharashtra">Maharashtra</button>
                        </h2>
                        <div id="collapseMaharashtra" class="accordion-collapse collapse"
                            data-bs-parent="#accordionWest">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/366/Mumbai">Mumbai</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/374/Pune">Pune</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/370/Nagpur">Nagpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/382/Thane">Thane</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/371/Nashik">Nashik</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/377/Aurangabad (Sambhajinagar)">Aurangabad</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseRajasthan">Rajasthan</button></h2>
                        <div id="collapseRajasthan" class="accordion-collapse collapse"
                            data-bs-parent="#accordionWest">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/514/Jaipur">Jaipur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/513/Jodhpur">Jodhpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/518/Kota">Kota</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/497/Bikaner">Bikaner</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/495/Ajmer">Ajmer</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/527/Udaipur (Udaipur RJ)">Udaipur</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- East Zone Modal -->
<div class="modal fade text-dark" id="EastZoneModal" tabindex="-1" aria-labelledby="EastZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="EastZoneModalLabel">East Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionEast">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseBihar">Bihar</button></h2>
                        <div id="collapseBihar" class="accordion-collapse collapse" data-bs-parent="#accordionEast">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/111/Muzaffarpur">Muzaffarpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/99/Gaya">Gaya</a>
                                    </div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/94/Bhagalpur">Bhagalpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/97/Darbhanga">Darbhanga</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseJharkhand">Jharkhand</button></h2>
                        <div id="collapseJharkhand" class="accordion-collapse collapse"
                            data-bs-parent="#accordionEast">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/245/Ranchi">Ranchi</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/236/Jamshedpur">Jamshedpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/233/Dhanbad">Dhanbad</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/232/Bokaro">Bokaro</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOdisha">Odisha</button></h2>
                        <div id="collapseOdisha" class="accordion-collapse collapse" data-bs-parent="#accordionEast">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/418/Bhubaneswar">Bhubaneswar</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/429/Cuttack">Cuttack</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/446/Rourkela">Rourkela</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/423/Brahmapur">Brahmapur</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseWB">West Bengal</button></h2>
                        <div id="collapseWB" class="accordion-collapse collapse" data-bs-parent="#accordionEast">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/717/Kolkata">Kolkata</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/710/Howrah">Howrah</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/704/Durgapur">Durgapur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/701/Asansol">Asansol</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Central Zone Modal -->
<div class="modal fade text-dark" id="CentralZoneModal" tabindex="-1" aria-labelledby="CentralZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="CentralZoneModalLabel">Central Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionCentral">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseMP">Madhya Pradesh</button></h2>
                        <div id="collapseMP" class="accordion-collapse collapse" data-bs-parent="#accordionCentral">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/307/Bhopal">Bhopal</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/320/Indore">Indore</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/321/Jabalpur">Jabalpur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/317/Gwalior">Gwalior</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/349/Ujjain">Ujjain</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="https://g2c.prarang.in/346/Sagar">Sagar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseChhattisgarh">Chhattisgarh</button>
                        </h2>
                        <div id="collapseChhattisgarh" class="accordion-collapse collapse"
                            data-bs-parent="#accordionCentral">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/142/Raipur">Raipur</a></div>
                                    <div class="col-6"><a target="_blank"
                                            href="/133/Bilaspur (Bilaspur CG)">Bilaspur</a></div>
                                    <div class="col-6"><a target="_blank" href="/137/Durg">Durg</a></div>
                                    <div class="col-6"><a target="_blank" href="/140/Korba">Korba</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Northeast Zone Modal -->
<div class="modal fade text-dark" id="NortheastZoneModal" tabindex="-1" aria-labelledby="NortheastZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="NortheastZoneModalLabel">Northeast Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start" style="min-height:75vh">
                <div class="accordion" id="accordionNE">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseAssam">Assam</button></h2>
                        <div id="collapseAssam" class="accordion-collapse collapse" data-bs-parent="#accordionNE">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/57/Guwahati">Guwahati</a></div>
                                    <div class="col-6"><a target="_blank" href="/67/Silchar">Silchar</a></div>
                                    <div class="col-6"><a target="_blank" href="/45/Dibrugarh">Dibrugarh</a></div>
                                    <div class="col-6"><a target="_blank" href="/51/Jorhat">Jorhat</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseMeghalaya">Meghalaya</button></h2>
                        <div id="collapseMeghalaya" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNE">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/393/Shillong">Shillong</a></div>
                                    <div class="col-6"><a target="_blank" href="/395/Tura">Tura</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTripura">Tripura</button></h2>
                        <div id="collapseTripura" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNE">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/605/Agartala">Agartala</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseManipurNagaMiAP">Manipur,
                                Nagaland,
                                Mizoram, Arunachal Pradesh</button></h2>
                        <div id="collapseManipurNagaMiAP" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNE">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/398/Imphal">Imphal</a></div>
                                    <div class="col-6"><a target="_blank" href="/410/Kohima">Kohima</a></div>
                                    <div class="col-6"><a target="_blank" href="/396/Aizawl">Aizawl</a></div>
                                    <div class="col-6"><a target="_blank" href="/28/Itanagar">Itanagar</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSikkim">Sikkim</button></h2>
                        <div id="collapseSikkim" class="accordion-collapse collapse"
                            data-bs-parent="#accordionNE">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/528/Gangtok">Gangtok</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Union Territories Modal -->
<div class="modal fade text-dark" id="UTZoneModal" tabindex="-1" aria-labelledby="UTZoneModalLabel"
    aria-hidden="true" data-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="UTZoneModalLabel">Union Territories</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="accordion" id="accordionUT">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseDelhi">Delhi</button></h2>
                        <div id="collapseDelhi" class="accordion-collapse collapse" data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/152/New Delhi">New Delhi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseJK">Jammu & Kashmir</button></h2>
                        <div id="collapseJK" class="accordion-collapse collapse" data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/756/Srinagar">Srinagar</a></div>
                                    <div class="col-6"><a target="_blank" href="/747/Jammu">Jammu</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseLadakh">Ladakh</button></h2>
                        <div id="collapseLadakh" class="accordion-collapse collapse"
                            data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/766/Leh">Leh</a></div>
                                    <div class="col-6"><a target="_blank" href="/767/Kargil">Kargil</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseChandigarh">Chandigarh</button>
                        </h2>
                        <div id="collapseChandigarh" class="accordion-collapse collapse"
                            data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/763/Chandigarh">Chandigarh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsePuducherry">Puducherry</button>
                        </h2>
                        <div id="collapsePuducherry" class="accordion-collapse collapse"
                            data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/468/Puducherry">Puducherry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseAndaman">Andaman &
                                Nicobar</button>
                        </h2>
                        <div id="collapseAndaman" class="accordion-collapse collapse"
                            data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/759/Port Blair">Port Blair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseDNH">Dadra & Nagar Haveli and
                                Daman &
                                Diu</button></h2>
                        <div id="collapseDNH" class="accordion-collapse collapse" data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/764/Daman">Daman</a></div>
                                    <div class="col-6"><a target="_blank" href="/765/Silvassa">Silvassa</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseLakshadweep">Lakshadweep</button>
                        </h2>
                        <div id="collapseLakshadweep" class="accordion-collapse collapse"
                            data-bs-parent="#accordionUT">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6"><a target="_blank" href="/768/Kavaratti">Kavaratti</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Move all modals to body to fix stacking context issues
        var modalIds = ['czechRegionsModal', 'indiaRegionsModal', 'NorthZoneModal', 'SouthZoneModal',
            'WestZoneModal', 'EastZoneModal', 'CentralZoneModal', 'NortheastZoneModal', 'UTZoneModal'
        ];
        modalIds.forEach(function(id) {
            var modal = document.getElementById(id);
            if (modal) {
                document.body.appendChild(modal);
            }
        });
    });
</script>
