@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => 'Knowledge',
'leftImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
'rightImg' => 'https://sarganga.org/assets/img/concept-center.JPG',
]),
'nav-sub-heading' => '',
];
@endphp
<x-layout.main.base :metaData="$metaData">
    <style>
        /* Column 6/12 */
        .col-sm-12 .col-md-6 {
            padding-left: 60px;
            padding-right: 60px;
        }

        @media (min-width:577px) {

            /* Benefit icon */
            .col-sm-12 .knowledge-benefit-card .benefit-icon {
                width: 170px;
                height: 160px;
            }

            /* Heading */
            .col-sm-12 .benefit-text h4 {
                font-size: 35px;
            }

        }
    </style>

    <section class="container">

        <div class="row">
            <div class="col-sm-12">
                <p class="text-center ">
                    Information is not Knowledge. Knowledge is not Intelligence. Intelligence is not Wisdom.
                </p>
                <p>

                    Information is structured & organized data & facts, which are useful. Understanding information and
                    related concepts creates Knowledge. Application of knowledge at the right time & place, is
                    Intelligence. A broad understanding based on experience & acquired knowledge, used for the
                    betterment of self & society, is Wisdom.


                <div class="row g-4 my-4">
                    <div class="col-md-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exhibitionModal"
                            class="knowledge-benefit-card h-100">
                            <div class="benefit-icon">
                                <img src="https://sarganga.org/assets/main/images/logo.jpg" alt="Sarganga Logo">
                            </div>
                            <div class="benefit-text">
                                <h4 class="mb-1">Delhi Exhibition 2026</h4>
                                <p class="mb-0 text-muted small">View Details</p>
                            </div>
                            <div class="benefit-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>

                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://sarganga.org/" target="_blank" class="knowledge-benefit-card h-100">
                            <div class="benefit-icon">
                                <img src="https://sarganga.org/assets/main/images/logo.jpg" alt="Sarganga Logo">
                            </div>
                            <div class="benefit-text">
                                <h4 class="mb-1">Saraswati by Ganga Museum</h4>
                                <p class="mb-0 text-muted small">sarganga.org</p>
                            </div>
                            <div class="benefit-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </div>

                        </a>
                    </div>
                </div>



                </p>
                <p style="" class="text-center small">"I have always imagined that paradise will be a kind of library."
                    - Jorge Luis Borges</p>
                <p style="font-size: 12px">
                    Can all the knowledge of the world be contained in one place if we could collect all the books ever
                    written, images ever printed & maps ever created, in one library ? Borges imagines just such a place
                    in his story " The Library of Babel, an endless library which contains not just all the books ever
                    made but even books yet to be made ( in the future). In another story Aleph, Borges stretches this
                    imagination even further where man in his quest for understanding the building blocks of language
                    itself, writes books with just one letter of the alphabet. The absurdity of it makes clear that
                    Complete knowledge of the universe is impossible for man to collect or to curate:.
                </p>
                <p class="font-semibold" style="font-size: 12px; color: #1267e7">
                    We aim to curate a Prarang Museum showcasing the Story of the Indian Civilization through the
                    evolution of its Cities & Towns, along its Rivers. Such a river civilization museum will be built to
                    show-case India:s Culture & Nature, on the outskirts of New Delhi, along the River Ganga. While this
                    museum on the river will take a few years to build, the objects & library to be housed inside the
                    museum, have already been collected by Prarang founding team members over the past 25 years. It is
                    this unique library of books, coins, statues, maps, comics, stamps, posters, carpets, furniture,
                    textiles, fossils, stones & other collectibles relating to Indian cities, which forms the core of
                    Prarang's daily knowledge posts.
                    <br> <br>
                    {{-- <a href="https://sarganga.org" target="_blank">Library of World Knowledge on the Ganga River
                        Bank
                    </a> --}}

                    {{--
                <div>
                    <div class="mt-4 ">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exhibitionModal">
                            <img src="https://i.ibb.co/MkscXbdy/download-2.gif" alt="">
                        </a>
                    </div>
                </div> --}}

                <div class="text-center flex justify-center items-center">
                    <img src="{{ asset('assets/images/home/kn.png') }}" alt="">
                </div>
            </div>
            <style>
                /* Link */
                .col-sm-12 div a {
                    display: flex;
                    justify-content: center;
                }

                /* Link */
                .col-sm-12 .font-semibold a {
                    color: #0043a8;
                }

                /* Font semibold */
                .container .font-semibold {
                    color: #1267e7 !important;
                }

                /* Modal body */
                .modal-lg .modal-body {
                    padding-top: 24px !important;
                    /* transform: translatex(0px) translatey(0px); */
                }

                /* Image */
                .modal-lg .modal-body img {
                    /* transform: translatex(0px) translatey(0px); */
                    width: 85% !important;
                }

                /* Position relative */
                .modal-lg .modal-body .position-relative {
                    display: flex;
                    justify-content: center;
                    flex-direction: row;
                    align-items: center;
                }

                /* Division */
                .modal-lg .modal-body .p-md-5 {
                    padding-top: 19px !important;
                }

                /* Bold */
                .modal-lg .p-md-5 h3.fw-bold {
                    text-align: center;
                }

                /* Paragraph */
                .modal-lg .p-md-5 p {
                    font-size: 16px !important;
                    /* transform: translatex(0px) translatey(0px); */
                    color: #303335 !important;
                    margin-bottom: 12px !important;
                }

                /* Premium Knowledge Cards Styling */
                .knowledge-benefit-card {
                    display: flex;
                    align-items: center;
                    background: #ffffff;
                    border: 1px solid rgba(0, 0, 0, 0.05);
                    border-radius: 16px;
                    padding: 20px;
                    text-decoration: none !important;
                    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
                    position: relative;
                    overflow: hidden;
                    width: 100%;
                }

                .knowledge-benefit-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                    border-color: rgba(18, 103, 231, 0.2);
                }

                .knowledge-benefit-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 4px;
                    height: 100%;
                    background: linear-gradient(180deg, #1267e7, #0043a8);
                    opacity: 0;
                    transition: opacity 0.3s;
                }

                .knowledge-benefit-card:hover::before {
                    opacity: 1;
                }

                .benefit-icon {
                    flex-shrink: 0;
                    width: 90px;
                    height: 90px;
                    border-radius: 12px;
                    overflow: hidden;
                    margin-right: 20px;
                    border: 2px solid #f8f9fa;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                }


                .benefit-icon img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .benefit-text {
                    flex-grow: 1;
                }

                .benefit-text h4 {
                    color: #1a1a1a;
                    font-size: 1.1rem;
                    font-weight: 700;
                    margin: 0;
                    letter-spacing: -0.2px;
                }

                .benefit-text p {
                    color: #6c757d;
                    font-weight: 500;
                }

                .benefit-arrow {
                    color: #dee2e6;
                    font-size: 1.2rem;
                    transition: all 0.3s;
                    margin-left: 10px;
                }

                .knowledge-benefit-card:hover .benefit-arrow {
                    color: #1267e7;
                    transform: translateX(5px);
                }

                /* Mobile adjustment */
                @media (max-width: 576px) {
                    .knowledge-benefit-card {
                        padding: 15px;
                    }

                    .benefit-icon {
                        width: 70px;
                        height: 70px;
                        margin-right: 15px;
                    }

                    .benefit-text h4 {
                        font-size: 1rem;
                    }
                }
            </style>


            {{-- Exhibition Modal Trigger --}}


            <!-- Exhibition Modal -->
            <div class="modal fade" id="exhibitionModal" tabindex="-1" aria-labelledby="exhibitionModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg" style="border-radius: 1.25rem; overflow: hidden;">
                        <div class="modal-body p-0">
                            <div class="position-relative">
                                <button type="button"
                                    class="btn-close position-absolute top-0 end-0 m-3 z-index-10 bg-white p-2 rounded-circle shadow-sm"
                                    data-bs-dismiss="modal" aria-label="Close"
                                    style="opacity: 0.8; transition: opacity 0.3s;"></button>
                                <img src="https://i.ibb.co/5gnvdQBc/exb.jpg" class="img-fluid w-100"
                                    alt="Exhibition Invitation" style="max-height: 400px; object-fit: cover;">
                            </div>
                            <div class="p-4 p-md-5 pt-4">
                                <h3 class="fw-bold mb-4 text-dark shadow-text" style="letter-spacing: -0.5px;">
                                    Indraprastha Cultural Festival</h3>
                                <p class="text-muted mb-4 fs-5 fw-light" style="line-height: 1.8;">
                                    We would like to invite you for an starting tomorrow. This exhibition traces the
                                    metamorphosis of India’s capital from the legendary foundations of Indraprastha to
                                    the planned symmetry of New Delhi. By synthesizing classic literature, antiquarian
                                    maps, and rare prints from the collection of Prarang Knowledge Webs, we move beyond
                                    physical ruins to explore how Delhi has been "imagined" across millennia.
                                </p>
                                <p class="text-muted mb-4 fs-6">
                                    You can come any time tomorrow or over the weekend. This is being exhibited as a
                                    part of the <span class="text-dark fw-bold">Indraprastha Cultural Festival</span>.
                                    To attend talks & cultural events at the festival, please register for free on -
                                    <a href="https://www.indraprasthafestival.com" target="_blank"
                                        class="text-primary text-decoration-none fw-bold border-bottom border-primary">https://www.indraprasthafestival.com</a>
                                </p>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-dark px-5 py-2 rounded-pill fw-bold"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>




</x-layout.main.base>
