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
    </style>
    {{-- {{dd($chittiArray)}} --}}
    <div class="carousel-wrap shadow">
        <div class="owl-carousel">
            @foreach ($chittiArray as $post)
                <div class="item shadow p-1" id="carousel-item" style="min-height:80px;">
                    <img class="img-carousel"data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->chittiId}}"  src="https://{{ $post->imageUrl }}" alt="Post Image">
                    <small class="p-0 m-0" style="font-size:10px">{{ \Illuminate\Support\Str::limit($post->Title, 15, '...') }}</small>
  
                </div>
            @endforeach
        </div>
    </div>
    <!-- Button trigger modal -->

  @foreach ($chittiArray as $post)
  <!-- Modal -->
  <div class="modal fade" data-bs-backdrop="false" id="exampleModal{{$post->chittiId}}" tabindex="-1" aria-labelledby="exampleModal{{$post->chittiId}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      {{-- {{dd($post)}} --}}
        <div class="modal-body">
            <section>
                <h3>{{$post->Title}}</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-start">
                          {{$post->tagInUnicode}} <br>
                            <small> {{$post->tagInEnglish}}</small>                           
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-end">
                            {{$post->dateOfApprove}}
                            <br>
                            {{$post->geography}}
                        </p>
                    </div>
                </div>
               
                <img class="img-fluid rounded" src="https://{{$post->imageUrl}}" alt="{{$post->SubTitle}}">
                <br><br>
                {!! $post->description!!}
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
  
  