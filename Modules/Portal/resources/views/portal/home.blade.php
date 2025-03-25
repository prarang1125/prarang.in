<x-layout.portal.base :portal="$portal">
    <style>
        #header .header-map--gmaps {
            height: 100vh;
        }

        @media (max-width:991px) {
            #main .hentry {
                position: relative;
                top: 65px;
            }
        }

        #wrapper footer>.container-fluid {
            background-color: rgba(213, 209, 209, 0.226);
        }

        #wrapper footer {
            background-color: rgba(0, 0, 0, 0.288) !important;

            background-size: auto;
            background-blend-mode: darken;
            background-attachment: fixed;
            transform: translatex(0px) translatey(0px);
        }

        #wrapper .header-background--single {
            background-color: rgba(0, 0, 0, 0.79) !important;

            background-size: auto;
            background-blend-mode: darken;
            background-attachment: fixed;
        }

        #wrapper footer p {
            color: #ffffff;
            font-size: 18px;
        }

        #wrapper footer .text-center {
            font-size: 24px;
            color: #ffffff;
        }

        /* Image */
        #carousel-item img {
            height: 70px !important;
            text-align: center;
            overflow: hidden;
            min-height: 80px !important;
            max-height: 80px !important;
        }

        /* Small Tag */
        #carousel-item small {
            white-space: break-spaces;
            text-align: center;
        }

        @media (max-width:991px) {

            /* Sidebar left  inner */
            #sidebar-left .sidebar-left__inner {
                margin-top: 101px;
            }

            /* Container openweathermap widget 15 */
            #container-openweathermap-widget-15 {
                display: flex;
                justify-content: center;
                align-items: center;
            }

        }

        @media (max-width:480px) {

            /* Heading */
            .hentry .main__header h1 {
                font-size: 14px;
            }

            /* Header */
            #main .hentry header {
                text-align: center;
            }

            /* Image */
            #wrapper #core .core__inner #columns .columns__inner .lsvr-container .lsvr-grid .columns__sidebar #sidebar-right .sidebar-right__inner .text-center a img {
                width: 100% !important;
            }

            /* Image */
            #sidebar-right a img {
                height: 500px !important;
            }

            /* Table */
            #sidebar-left .widget .table {
                background-color: rgba(0, 0, 0, 0);
            }

            /* Table Data */
            .table tr td {
                background-color: #333333;
                color: #e8e8e8;
            }

        }

        /* Header background  single */
        #wrapper .header-background--single {
            background-color: rgba(0, 0, 0, 0.24) !important;
        }

        /* Paragraph */
        /* Paragraph */
#wrapper .col-sm p{
 font-size:15px;
 letter-spacing:normal;
 color:#ffffff;
 text-shadow:rgb(0, 0, 0) 1px 1px 0px, rgb(0, 0, 0) 2px 2px 0px;
 font-weight:500;
}

/* Footer */
#wrapper footer{
 background-color:rgba(0,0,0,0.52) !important;
}

/* Table */
#sidebar-left .widget .table{
 background-color:rgba(255,255,255,0) !important;
}

/* Table Data */
.table tr td{
 background-color:#333333 !important;
 color:#ededed !important;
 font-size:13px !important;
 padding-bottom:4px !important;
}

#wrapper .col-sm p{
 text-shadow:rgba(0, 0, 0, 0.3) 0px 1px 1px !important;
}

/* Heading */
#openModalx h3{
 position:absolute;
 padding-left:154px;
 padding-top:4px;
 padding-right:9px;
}

@media (max-width:1316px){

 /* Heading */
 #openModalx h3{
  font-size:20px !important;
  padding-left:84px;
  transform:translatex(0px) translatey(0px);
 }

}

@media (max-width:991px){

 /* Heading */
 #openModalx h3{
  font-size:19px !important;
  padding-left:277px;
  padding-right:153px;
  transform:translatex(0px) translatey(0px);
 }

}

@media (max-width:767px){

 /* Heading */
 #openModalx h3{
  font-size:15px !important;
  padding-left:219px;
  padding-right:142px;
 }

}

@media (min-width:1317px){

 /* Heading */
 #openModalx h3{
  font-size:23px;
 }

}
@media (max-width:767px){

/* Heading */
#openModalx h3{
 padding-left:98px !important;
 padding-right:34px !important;
 font-size:17px;
}

/* Heading */
#core #columns .columns__inner .lsvr-container .lsvr-grid .columns__main #main div .text-center .popupsub #openModalx h3{
 font-size:17px !important;
}

}

@media (max-width:480px){

/* Heading */
#openModalx h3{
 padding-left:77px !important;
 padding-right:20px !important;
 top:3px;
 bottom:auto !important;
}

}

    </style>
    <div id="wrapper">
        <header class="header--has-languages header--has-map" id="header">
            <div class="header__inner">
                <!-- HEADER MAP : begin -->
                <div class="header-map header-map--loading header-map--gmaps">
                    {!! $portal->map_link !!}

                    <button aria-label="Close map" class="header-map__close" type="button">
                        <i aria-hidden="true" class="header-map__close-ico fa fa-times">
                        </i>
                    </button>
                </div>
                <!-- HEADER MAP : end -->
                <!-- HEADER CONTENT : begin -->
                <div class="header__content">
                    <div class="lsvr-container">
                        <div class="header__content-inner">
                            <!-- HEADER BRANDING : begin -->
                            <div class="header-logo header-logo--front">
                                <a aria-label="Site logo" class="header-logo__link" href="{{ url()->current() }}">
                                    <img alt="TownPress" class="header-logo__image"
                                        src="{{ asset('assets/images/logo2x.png') }}" />
                                </a>
                            </div>
                            <div class="header-toolbar-toggle header-toolbar-toggle--has-map">
                                <button aria-controls="header-mobile-menu" aria-expanded="false" aria-haspopup="true"
                                    class="header-toolbar-toggle__menu-button" type="button">
                                    <i class="fa fa-bars"></i>

                                    <span class="header-toolbar-toggle__menu-button-label">
                                        Menu
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : begin -->
                                <button aria-label="Open / close map"
                                    class="header-map-toggle header-map-toggle--mobile" type="button">

                                    <i class="fa fa-map-marker"></i>

                                    <span class="header-map-toggle__label">
                                        <b>शहर का नक्शा</b>
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : end -->
                            </div>
                            <!-- HEADER TOOLBAR TOGGLE : end -->
                            <!-- HEADER TOOLBAR : begin -->
                            <div class="header-toolbar">

                                <!-- HEADER MAP TOGGLE : begin -->
                                <button aria-label="Open / close map"
                                    class="header-map-toggle header-map-toggle--desktop header-toolbar__item"
                                    type="button">

                                    <i class="fa fa-map-marker"></i>
                                    <span class="header-map-toggle__label">
                                        <b>शहर का नक्शा</b>
                                    </span>
                                </button>
                                <!-- HEADER MAP TOGGLE : end -->
                                <!-- HEADER MOBILE MENU : begin -->
                                <nav aria-label="Main Menu" class="header-mobile-menu"
                                    data-label-collapse-submenu="Collapse submenu"
                                    data-label-expand-submenu="Expand submenu" id="header-mobile-menu">
                                    <ul class="header-mobile-menu__list" id="menu-main-menu" role="menu">
                                        <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                            id="header-mobile-menu__item-222" role="presentation">
                                            <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                href="{{ route('portal', ['portal' => $portal->slug]) }}"
                                                id="header-mobile-menu__item-link-222" role="menuitem">
                                                <span class="header-mobile-menu__item-link-label">
                                                    HOME / होम
                                                </span>
                                            </a>
                                        </li>
                                        <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                            id="header-mobile-menu__item-222" role="presentation">
                                            <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                                id="header-mobile-menu__item-link-222" role="menuitem">
                                                <span class="header-mobile-menu__item-link-label">
                                                    See All Posts /सभी रंग देखे
                                                </span>
                                            </a>
                                        </li>
                                        {{-- <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                            id="header-mobile-menu__item-222" role="presentation">
                                            <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                href="https://preview.lsvr.sk/townpress/news/"
                                                id="header-mobile-menu__item-link-222" role="menuitem">
                                                <span class="header-mobile-menu__item-link-label">
                                                    News
                                                </span>
                                            </a>
                                        </li> --}}
                                        <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                            id="header-mobile-menu__item-222" role="presentation">
                                            <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                href="{{ env('G2C_URL') }}/{{ $portal->city_name }}/{{ $portal->local_lang }}"
                                                id="header-mobile-menu__item-link-222" role="menuitem">
                                                <span class="header-mobile-menu__item-link-label">
                                                    District Metrics / जिला मेट्रिक्स
                                                </span>
                                            </a>
                                        </li>
                                </nav>
                                <!-- HEADER MOBILE MENU : end -->
                            </div>
                            <!-- HEADER TOOLBAR : end -->
                        </div>
                    </div>
                </div>
                <!-- HEADER CONTENT : end -->
            </div>

        </header>

        <!-- HEADER : end -->
        <div class="header-background header-background--singled" data-slideshow-speed="10">
            <div class="header-background__image header-background__image--default"
                style="background-image: url('{{ Storage::url($portal->header_image) }}'); ">

            </div>

        </div>

        <!-- CORE : begin -->
        <div id="core">
            <div class="core__inner">
                <!-- COLUMNS : begin -->
                <div id="columns">
                    <div class="columns__inner">
                        <div class="lsvr-container">
                            <div class="lsvr-grid">
                                <div class="columns__main lsvr-grid__col lsvr-grid__col--span-6 lsvr-grid__col--push-3">

                                    <!-- MAIN : begin -->
                                    <main id="main">
                                        @livewire('portal.elements.sub-pop-up',['banner'=>'sub-1','slug'=>$portal->slug,'portal'=>$portal])
                                        <div class="main__inner">
                                            <div class="post-207 page type-page status-publish hentry">
                                                <!-- MAIN HEADER : begin -->
                                                <header class="main__header">
                                                    <h1 class="m-0 main__title">
                                                        {!! $portal->city_slogan !!}
                                                    </h1>
                                                </header>
                                                <!-- MAIN HEADER : end -->
                                                <!-- PAGE CONTENT : begin -->
                                                <div class="page__content">
                                                    <x-portal.posts-carousel :cityId="$cityCode" :cityCode="$cityCode" />
                                                    <!-- TOWNPRESS SITEMAP : begin -->
                                                    <x-portal.tag-list :cityId="$cityCode" :cityCode="$cityCode"
                                                        :citySlug="$portal->slug" />

                                                    <div class="p-2 mt-3 " style="border:2px solid #FFB1A3">
                                                        <h3 class="text-center">{{ $portal->city_name_local }} के आंकड़े
                                                        </h3>
                                                        <a target="_blank"
                                                            href="{{ env('G2C_URL') }}/{{ $portal->city_name }}/hi"><img
                                                                src="{{ asset('assets/portal/images/matrix-24.jpg') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <!-- TOWNPRESS SITEMAP : end -->
                                                </div>
                                                <!-- PAGE CONTENT : end -->
                                            </div>
                                        </div>
                                    </main>
                                    <!-- MAIN : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--left lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--pull-6">
                                    <!-- LEFT SIDEBAR : begin -->
                                    <aside id="sidebar-left">
                                        <div class="sidebar-left__inner">
                                            <div class="widget lsvr-townpress-menu-widget" id="lsvr_townpress_menu-2">
                                                <div class="widget__inner">
                                                    <div class="widget__content">
                                                        <nav aria-label="Main Menu"
                                                            class="lsvr-townpress-menu-widget__nav lsvr-townpress-menu-widget__nav--expanded-active"
                                                            data-label-collapse-submenu="Collapse submenu"
                                                            data-label-expand-submenu="Expand submenu">
                                                            <ul class="lsvr-townpress-menu-widget__list"
                                                                id="menu-main-menu-1" role="menu">
                                                                <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children"
                                                                    id="lsvr-townpress-menu-widget__item-226-251"
                                                                    role="presentation">
                                                                    <a aria-controls="lsvr-townpress-menu-widget__submenu-226-251"
                                                                        aria-expanded="false" aria-haspopup="true"
                                                                        aria-owns="lsvr-townpress-menu-widget__submenu-226-251"
                                                                        class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                        href="{{ route('portal', ['portal' => $portal->slug]) }}"
                                                                        id="lsvr-townpress-menu-widget__item-link-226-251"
                                                                        role="menuitem">
                                                                        <span
                                                                            class="lsvr-townpress-menu-widget__item-link-label">
                                                                            HOME / होम
                                                                        </span>
                                                                    </a>


                                                                </li>
                                                                <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                    id="lsvr-townpress-menu-widget__item-222-830"
                                                                    role="presentation">
                                                                    <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                        href="{{ route('posts.city', ['city' => $portal->slug]) }}"
                                                                        id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                        role="menuitem">
                                                                        <span
                                                                            class="lsvr-townpress-menu-widget__item-link-label">
                                                                            See All Posts /सभी रंग देखे
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                    id="lsvr-townpress-menu-widget__item-222-830"
                                                                    role="presentation">
                                                                    <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                        href="{{ env('G2C_URL') }}/{{ $portal->city_name }}/{{ $portal->local_lang }}"
                                                                        id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                        role="menuitem">
                                                                        <span
                                                                            class="lsvr-townpress-menu-widget__item-link-label">
                                                                            District Metrics / जिला मेट्रिक्स
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                    id="lsvr-townpress-menu-widget__item-222-830"
                                                                    role="presentation">
                                                                    <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                        href="{{ route('about-us') }}"
                                                                        id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                        role="menuitem">
                                                                        <span
                                                                            class="lsvr-townpress-menu-widget__item-link-label">
                                                                            ABOUT US / हमारे बारे में
                                                                        </span>
                                                                    </a>
                                                                </li>


                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="lsvr_townpress_weather-2">
                                                <div class="widget__inner">
                                                    <h3 class="widget__title widget__title--has-icon ps-2">
                                                        <i class="fa fa-map-marker"></i>
                                                        स्थानीय जानकारी
                                                    </h3>
                                                    <div class="widget__content">

                                                        <div class="city_matrix">
                                                            {!! $portal->local_matrics !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                id="lsvr_townpress_weather-2">
                                                <div class="widget__inner"
                                                    style="background:white; color:black; border:2px solid #FFB1A3;">
                                                    <h3 class="widget__title widget__title--has-icon ps-2 text-dark">
                                                        <i class="fa fa-newspaper-o"></i>
                                                        {{ $portal->city_name }} NEWS/ {{ $portal->city_name_local }}
                                                        समाचार
                                                    </h3>
                                                    <div class="widget__content">

                                                        <div class="city_matrix">
                                                            <!-- TODO: News Update link -->
                                                            <x-portal.widgets.news :url="$portal->news_widget_code" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </aside>
                                    <!-- LEFT SIDEBAR : end -->
                                </div>
                                <div
                                    class="columns__sidebar columns__sidebar--right lsvr-grid__col lsvr-grid__col--span-3">
                                    <!-- RIGHT SIDEBAR : begin -->
                                    <aside id="sidebar-right">
                                        <div class="sidebar-right__inner">
                                            <x-portal.widgets.smart-meeting :portal="$portal" />
                                            <div class="text-center widget">
                                                {!! $portal->weather_widget_code !!}
                                            </div>
                                            <p class="text-center">
                                                <a href="{{ route('city.show',['city_name'=>$yellowPages->name]) }}"><img class="img-fluid" style="height:450px;"
                                                        src="{{ asset('assets/images/yellowpages.jpg') }}"
                                                        alt=""></a>
                                            </p>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #wrapper footer .row .col p {
                margin-bottom: 5px !important;
            }
        </style>

        <footer class="p-4 ps-4 pe-4"
            style="background-color: #FFB1A3; margin-top:200px;  background-image: url('{{ Storage::url($portal->footer_image) }}');">
            <div class="row g-2">
                <div class="col-sm">
                    <h4 class="text-center">प्रारंग के बारे में </h4>
                    <p>प्रारंग प्रदान करता है, देश-विदेश के शहरों को समझने हेतु संपूर्ण जानकारी। जिसमे शामिल है स्थानीय भाषा में शहर की प्रकृति-संस्कृति के नॉलेज वेब, शहर की व्यवसाय सूची के येलो पेज, शहर के मेट्रिक्स या आंकड़ों का विस्तृत विश्लेषण, तथा AI द्वारा संचालित शहरवासियों से प्राप्त विशिष्ट सांकेतिकता</p>
                </div>
                <div class="text-center col-sm">
                    <h4 class="text-center">हमें फॉलो करें</h4>
                    <div class="row">
                        <div class="col-6">
                            <a href="https://www.facebook.com/prarang.in" target="_blank">
                                <i class="p-2 shadow fa fa-facebook rounded-circle fa-2x"></i> <span
                                    class="h4">Facebook</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="https://twitter.com/prarangin" target="_blank">
                                <i class="p-2 shadow fa fa-twitter rounded-circle fa-2x"></i><span class="h4">
                                    Twitter</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="https://www.instagram.com/prarang.in/" target="_blank">
                                <i class="p-2 shadow fa fa-instagram rounded-circle fa-2x"></i> <span
                                    class="h4">Instagram</span>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="https://www.linkedin.com/company/prarang-in" target="_blank">
                                <i class="p-2 shadow fa fa-linkedin rounded-circle fa-2x"></i> <span class="h4">
                                    LinkedIn</span>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ps-3">
                    <h4 class="text-center"><i class="tp tp-eye"></i> पता</h4>
                    <p>ऑफिस #25,11th फ्लोर,दा आई- थम,A40,</p>
                    <p>सेक्टर 62,नॉएडा(U.P),इंडिया 201309</p>
                    <p>फ़ोन: 0120-4561284</p>
                    <p>मेल: <a href="mailto:query@prarangin">Query@prarang.in</a> </p>
                </div>
            </div>
            <div class="p-4">
                <p>© - {{ date('Y') }} All content on this website, such as text, graphics, logos, button icons,
                    software, images
                    and its selection, arrangement, presentation & overall design, is the property of Indoeuropeans
                    India Pvt. Ltd. and protected by international copyright laws.</p>
            </div>
        </footer>

    </div>


    <script>
        // Wait for the DOM to load
        document.addEventListener("DOMContentLoaded", function() {
            // Select the parent element with the class 'header-map'
            const headerMapElement = document.querySelector('.header-map');

            if (headerMapElement) {
                // Find the iframe inside the 'header-map' element
                const iframe = headerMapElement.querySelector('iframe');

                if (iframe) {
                    // Apply the desired classes to the iframe
                    iframe.classList.add('header-map__canvas', 'header-map__canvas--loading');
                    console.log("Classes added to the iframe inside header-map.");
                } else {
                    console.warn("No iframe found inside the 'header-map' element.");
                }
            } else {
                console.error("The 'header-map' element is not found in the DOM.");
            }
        });
    </script>

</x-layout.portal.base>
