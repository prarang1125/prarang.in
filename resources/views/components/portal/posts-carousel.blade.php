<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <style>
        .carousel-wrap {
            /* margin: 90px auto; */
            padding: 0 5%;
            width: 100%;
            position: relative;
        }

        .owl-carousel {
            padding: 10px;
            /* Add some padding to prevent content from sticking to edges */
        }

        /* Fix blank or flashing items on the carousel */
        .owl-carousel .item {
            position: relative;
            z-index: 100;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        /* Image inside carousel items */
        .owl-carousel .item img {
            display: block;
            width: 100%;
            /* Ensure images fill the container */
            height: auto;
            /* Maintain image aspect ratio */
        }

        /* Owl navigation controls */
        .owl-nav>div {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #cdcbcd;
            cursor: pointer;
            font-size: 30px;
            /* Control the size of the arrows */
        }

        /* Adjust the position of the prev and next buttons */
        .owl-nav .owl-prev {
            left: -30px;
        }

        .owl-nav .owl-next {
            right: -30px;
        }

        .owl-nav i {
            font-size: 40px;
            /* Size of the icons */
        }

        /* Optional: Add some hover effects to navigation buttons */
        .owl-nav .owl-prev:hover,
        .owl-nav .owl-next:hover {
            color: #fff;
        }

        /* Carousel wrap */
        .hentry div .carousel-wrap {
            background-color: #ffffff;
            margin-bottom: 12px;

            /* border-color:#cd3308; */
        }

        /* Font Icon */
        .owl-nav .owl-next i {
            color: #cd3308;
        }

        /* Font Icon */
        .owl-nav .owl-prev i {
            color: #cd3308;
        }

        /* CSS to ensure all images in the carousel are the same size */
        .img-carousel {
            width: 100%;
            /* Full width within its container */
            height: 200px;
            /* Fixed height for consistency */
            object-fit: cover;
            /* Maintain aspect ratio, crop overflow if necessary */
        }

        /* Column 10/12 */
        .hentry a .m-0 {
            padding-top: 8px !important;
            /* cursor:alias; */
        }

        /* Column 10/12 */
        .hentry div .modal .modal-dialog .modal-content .modal-body .mb-1 a .row .tagListx .row .m-0 {
            transform: translatex(0px) translatey(0px) !important;
        }

        /* Rounded circle */
        .hentry .tagListx .rounded-circle {
            padding-left: 4px;
            margin-left: 0px;
            position: relative;
            left: 8px;
        }

        /* Rounded circle */
        .hentry div .modal .modal-dialog .modal-content .modal-body .mb-1 a .row .tagListx .row .col-2 .rounded-circle {
            width: 112% !important;
        }

        .hentry div .modal {
            /* border: 1px solid #cd3308; */
            background: rgba(83, 81, 81, 0.8);
        }

        /* Small Tag */
        .hentry a small {
            position: relative;
            top: -2px;
        }

        /* Modal body */
        .hentry div .modal-body {
            padding-right: 26px;
        }

        /* Modal body */
        #core .lsvr-container .lsvr-grid .columns__main #main .main__inner .hentry .page__content div .modal .modal-dialog .modal-content .modal-body {
            transform: translatex(0px) translatey(0px) !important;
        }

        /* Heading */
        .hentry a h6 {
            font-weight: 500 !important;
            font-size: 14px;
        }

        /* Img fluid */
        .hentry a .img-fluid {
            border-style: solid;
            border-width: 2px !important;
            border-color: #cd3308 !important;
            width: 44px;
            position: relative;
            top: 4px;
        }
    </style>
    {{-- {{dd($chittiArray)}} --}}
    <div class="shadow carousel-wrap">
        <div class="owl-carousel">
            @foreach ($chittiArray as $postImg)
                <div class="p-1 shadow item" id="carousel-item" style="min-height:80px;">
                    <img class="img-carousel"data-bs-toggle="modal" data-bs-target="#exampleModal{{ $postImg->chittiId }}"
                        src="https://{{ $postImg->imageUrl }}" alt="Post Image">
                    <small class="p-0 m-0"
                        style="font-size:10px">{{ \Illuminate\Support\Str::limit($postImg->Title, 15, '...') }}</small>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Button trigger modal -->

    @foreach ($chittiArray as $post)
        <!-- Modal -->
        <div class="modal fade" data-bs-backdrop="false" id="exampleModal{{ $post->chittiId }}" tabindex="-1"
            aria-labelledby="exampleModal{{ $post->chittiId }}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    {{-- {{dd($post)}} --}}
                    <div class="modal-body">
                        <section>
                            <h3>{{ $post->Title }}</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-start">
                                        {{ $post->tagInUnicode }} <br>
                                        <small> {{ $post->tagInEnglish }}</small>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-end">
                                        {{ $post->dateOfApprove }}
                                        <br>
                                        {{ $post->geography }}
                                    </p>
                                </div>
                            </div>

                            <img class="rounded img-fluid" src="https://{{ $post->imageUrl }}"
                                alt="{{ $post->SubTitle }}">
                            <br><br>
                            {!! $post->description !!}
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
    <script>
        // Initialize Owl Carousel
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    </script>
</div>
