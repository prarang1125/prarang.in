<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <style>
        .carousel-wrap {
            width: 100%;
            position: relative;
            padding: 0 20px;
            background: transparent;
        }

        .owl-carousel .item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            height: 240px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .owl-carousel .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .item-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
        }

        .owl-carousel .item:hover .item-bg {
            transform: scale(1.1);
        }

        .item-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 50%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 16px;
            color: white;
        }

        .item-tag {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #2563eb;
            color: white;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .item-title {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-subtitle {
            font-size: 12px;
            opacity: 0.8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Owl Nav & Dots Container */
        .owl-controls {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
            padding: 0 10px;
        }

        /* Combined Layout Hack: Positioning dots and nav together */
        .owl-dots {
            background: rgba(0, 0, 0, 0.8);
            padding: 8px 16px;
            border-radius: 99px;
            display: flex !important;
            align-items: center;
            gap: 6px;
            margin: 0 !important;
        }

        .owl-dot {
            width: 8px !important;
            height: 8px !important;
            background: rgba(255, 255, 255, 0.4) !important;
            border-radius: 50% !important;
            border: none !important;
            padding: 0 !important;
            transition: all 0.3s ease;
        }

        .owl-dot.active {
            width: 24px !important;
            background: white !important;
            border-radius: 10px !important;
        }

        .owl-nav {
            display: flex;
            gap: 8px;
            margin: 0 !important;
        }

        .owl-nav button {
            width: 40px !important;
            height: 40px !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease !important;
            border: none !important;
            position: static !important;
            transform: none !important;
            margin: 0 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
        }

        .owl-nav .owl-prev {
            background-color: #e5e7eb !important;
            /* light gray */
            color: #1f2937 !important;
            /* dark gray text/icon */
        }

        .owl-nav .owl-prev:hover {
            background-color: #d1d5db !important;
        }

        .owl-nav .owl-next {
            background-color: #2563eb !important;
            /* blue */
            color: white !important;
        }

        .owl-nav .owl-next:hover {
            background-color: #1d4ed8 !important;
        }

        /* Custom Icon Sizes */
        .owl-nav button i {
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <div class="carousel-wrap">
        <div class="owl-carousel owl-theme">
            @foreach ($chittiArray as $postImg)
                <div class="item" onclick="openChittiModal('carouselModal{{ $postImg->chittiId }}')">
                    <div class="item-bg" style="background-image: url('{{ $postImg->imageUrl }}')"></div>
                    <div class="item-overlay">
                        <span class="item-tag">
                            {{ $locale['tags'][$postImg->tagId] ?? $postImg->tagId }}
                        </span>
                        <h4 class="item-title text-white">{{ $postImg->Title }}</h4>
                        <p class="item-subtitle text-white/80">{{ strip_tags($postImg->description) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Navigation Bar below carousel --}}
        <div class="flex items-center justify-center md:justify-end gap-4 mt-6 px-4 mb-4">
            <div id="customDots" class="owl-dots"></div>
            <div id="customNav" class="owl-nav"></div>
        </div>
    </div>

    @foreach ($chittiArray as $post)
        <!-- Modal -->
        <div id="carouselModal{{ $post->chittiId }}"
            class="chitti-modal fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4 overflow-y-auto"
            onclick="if(event.target == this) closeChittiModal('carouselModal{{ $post->chittiId }}')" wire:ignore.self>

            <div
                class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all animate__animated animate__zoomIn animate__faster my-auto">
                {{-- Premium Header --}}
                <div class="relative h-2 bg-gradient-to-r from-red-500 via-yellow-400 to-blue-500"></div>

                <div class="p-0">
                    {{-- Post Content Header --}}
                    <div class="px-8 pt-8 pb-4">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                            <span
                                class="bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-md shadow-sm">
                                {{ $locale['tags'][$post->tagId] ?? $post->tagId }}
                            </span>
                            <div class="text-right text-gray-400 text-xs font-bold uppercase tracking-tighter">
                                {{ $post->dateOfApprove }} @if ($post->geography)
                                    • {{ $post->geography }}
                                @endif
                            </div>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 leading-tight mb-6">
                            {{ $post->Title }}
                        </h3>
                    </div>

                    {{-- Main Post Image --}}
                    <div class="px-8 mb-6">
                        <div class="relative group">
                            <img class="w-full rounded-xl shadow-lg object-cover max-h-[400px]"
                                src="{{ $post->imageUrl }}" alt="{{ $post->Title }}">
                            <div class="absolute inset-0 rounded-xl ring-1 ring-inset ring-black/10"></div>
                        </div>
                    </div>

                    {{-- Description Area --}}
                    <div class="px-8 pb-10 prose prose-slate max-w-none">
                        <div class="text-gray-700 leading-relaxed text-lg">
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50/50 px-8 py-4 border-t border-gray-100 flex justify-end">
                    <button type="button" onclick="closeChittiModal('carouselModal{{ $post->chittiId }}')"
                        class="bg-white hover:bg-gray-100 text-gray-700 font-bold px-8 py-2.5 rounded-xl transition-all shadow-sm border border-gray-200">
                        {{ $locale['ui']['close'] ?? 'Close' }}
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
    <script>
        function openChittiModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeChittiModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }

        // Initialize Owl Carousel
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: true,
            dotsContainer: '#customDots',
            navContainer: '#customNav',
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
                    items: 3
                }
            }
        });
    </script>
</div>
