<x-layout.portal.base>
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
            background-color: rgba(213, 209, 209, 0.34);
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
                                        src="{{ asset('https://www.prarang.in/meerut/images/header-logo.2x.png') }}" />
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
        <div class="header-background header-background--single" data-slideshow-speed="10">
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
                                                            <x-portal.widgets.news />
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


                                        </div>
                                    </aside>
                                    <!-- RIGHT SIDEBAR : end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS : end -->
            </div>
        </div>
        <!-- CORE : end -->
        <!-- FOOTER : begin -->
        <div style="min-height:200px;"></div>
        {{-- <footer class="footer--has-backgroundx " id="footer"
            style="background-image: url( 'https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/footer-bg.jpg' );">
            <div class="footer__inner">
                <!-- FOOTER WIDGETS : begin -->
                <div class="footer-widgets">
                    <div class="footer-widgets__inner">
                        <div class="lsvr-container">
                            <div class="lsvr-grid lsvr-grid--4-cols lsvr-grid--md-2-cols">
                                <div
                                    class="footer-widgets__column lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--md lsvr-grid__col--md-span-6 lsvr-grid__col--lg lsvr-grid__col--lg-span-6">
                                    <div class="footer-widgets__column-inner">
                                        <div class="widget widget_text" id="text-2">
                                            <div class="widget__inner">
                                                <h3 class="widget__title">
                                                    About TownPress
                                                </h3>
                                                <div class="textwidget">
                                                    <p>

                                                    </p>
                                                    <p>
                                                        <strong>
                                                            <a href="https://themeforest.net/user/lsvrthemes/portfolio?ref=LSVRthemes"
                                                                rel="noopener" target="_blank">
                                                                Purchase TownPress
                                                            </a>
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="footer-widgets__column lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--md lsvr-grid__col--md-span-6 lsvr-grid__col--lg lsvr-grid__col--lg-span-6">
                                    <div class="footer-widgets__column-inner">
                                        <div class="widget lsvr_event-list-widget" id="lsvr_events_event_list-2">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon">
                                                    <span aria-hidden="true"
                                                        class="widget__title-icon icon-calendar-full">
                                                    </span>
                                                    Upcoming Events
                                                </h3>
                                                <div class="widget__content">
                                                    <ul
                                                        class="lsvr_event-list-widget__list lsvr_event-list-widget__list--has-bold-date">
                                                        <li
                                                            class="lsvr_event-list-widget__item lsvr_event-list-widget__item--has-thumb">
                                                            <p class="lsvr_event-list-widget__item-date lsvr_event-list-widget__item-date--bold"
                                                                title="October 12, 2024">
                                                                <span aria-hidden="true"
                                                                    class="lsvr_event-list-widget__item-date-month">
                                                                    Oct
                                                                </span>
                                                                <span aria-hidden="true"
                                                                    class="lsvr_event-list-widget__item-date-day">
                                                                    12
                                                                </span>
                                                            </p>
                                                            <h4 class="lsvr_event-list-widget__item-title">
                                                                <a class="lsvr_event-list-widget__item-title-link"
                                                                    href="https://preview.lsvr.sk/townpress/events/sunday-townpress-run/">
                                                                    Sunday TownPress Run
                                                                </a>
                                                            </h4>
                                                            <p class="lsvr_event-list-widget__item-info">
                                                                <span class="lsvr_event-list-widget__item-time"
                                                                    title="Event Time">
                                                                    All-day event
                                                                </span>
                                                                <span class="lsvr_event-list-widget__item-location"
                                                                    title="Event Location">
                                                                    at
                                                                    <a class="lsvr_event-list-widget__item-location-link"
                                                                        href="https://preview.lsvr.sk/townpress/event-location/downtown/">
                                                                        Downtown
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li
                                                            class="lsvr_event-list-widget__item lsvr_event-list-widget__item--has-thumb">
                                                            <p class="lsvr_event-list-widget__item-date lsvr_event-list-widget__item-date--bold"
                                                                title="October 13, 2024">
                                                                <span aria-hidden="true"
                                                                    class="lsvr_event-list-widget__item-date-month">
                                                                    Oct
                                                                </span>
                                                                <span aria-hidden="true"
                                                                    class="lsvr_event-list-widget__item-date-day">
                                                                    13
                                                                </span>
                                                            </p>
                                                            <h4 class="lsvr_event-list-widget__item-title">
                                                                <a class="lsvr_event-list-widget__item-title-link"
                                                                    href="https://preview.lsvr.sk/townpress/events/town-meeting/">
                                                                    Town Meeting
                                                                </a>
                                                            </h4>
                                                            <p class="lsvr_event-list-widget__item-info">
                                                                <span class="lsvr_event-list-widget__item-time"
                                                                    title="Event Time">
                                                                    6:00 pm - 7:30 pm
                                                                </span>
                                                                <span class="lsvr_event-list-widget__item-location"
                                                                    title="Event Location">
                                                                    at
                                                                    <a class="lsvr_event-list-widget__item-location-link"
                                                                        href="https://preview.lsvr.sk/townpress/event-location/downtown-theater/">
                                                                        Downtown Theater
                                                                    </a>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="footer-widgets__column lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--md lsvr-grid__col--md-span-6 lsvr-grid__col--lg lsvr-grid__col--lg-span-6">
                                    <div class="footer-widgets__column-inner">
                                        <div class="widget lsvr_document-list-widget"
                                            id="lsvr_documents_document_list-2">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon">
                                                    <span aria-hidden="true"
                                                        class="widget__title-icon icon-file-text-o">
                                                    </span>
                                                    Important Forms
                                                </h3>
                                                <div class="widget__content">
                                                    <ul class="lsvr_document-list-widget__list">
                                                        <li class="lsvr_document-list-widget__item">
                                                            <h4 class="lsvr_document-list-widget__item-title">
                                                                <a class="lsvr_document-list-widget__item-title-link"
                                                                    href="https://preview.lsvr.sk/townpress/documents/town-board-applications/">
                                                                    Town Board Applications
                                                                </a>
                                                            </h4>
                                                            <div class="lsvr_document-list-widget__item-info">
                                                                <p class="lsvr_document-list-widget__item-date">
                                                                    December 2, 2018
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="lsvr_document-list-widget__item">
                                                            <h4 class="lsvr_document-list-widget__item-title">
                                                                <a class="lsvr_document-list-widget__item-title-link"
                                                                    href="https://preview.lsvr.sk/townpress/documents/temporary-sign-permit-application/">
                                                                    Temporary Sign Permit Application
                                                                </a>
                                                            </h4>
                                                            <div class="lsvr_document-list-widget__item-info">
                                                                <p class="lsvr_document-list-widget__item-date">
                                                                    November 26, 2018
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p class="widget__more">
                                                        <a class="widget__more-link"
                                                            href="https://preview.lsvr.sk/townpress/documents/">
                                                            More Documents
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="footer-widgets__column lsvr-grid__col lsvr-grid__col--span-3 lsvr-grid__col--md lsvr-grid__col--md-span-6 lsvr-grid__col--lg lsvr-grid__col--lg-span-6">
                                    <div class="footer-widgets__column-inner">
                                        <div class="widget widget_text" id="text-3">
                                            <div class="widget__inner">
                                                <h3 class="widget__title widget__title--has-icon">
                                                    <span aria-hidden="true"
                                                        class="widget__title-icon icon-envelope-o">
                                                    </span>
                                                    Quick Contact
                                                </h3>
                                                <div class="textwidget">
                                                    <p>
                                                        P.O. Box 123 TownPress
                                                        <br />
                                                        VT 12345
                                                    </p>
                                                    <p>
                                                        Phone: (123) 456-7890
                                                        <br />
                                                        Fax: (123) 456-7891
                                                        <br />
                                                        Email:
                                                        <a href="http://wpdemos.lsvr.sk/townpress/#">
                                                            townpress@example.org
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER WIDGETS : end -->
                <!-- FOOTER BOTTOM : begin -->
                <div class="footer-bottom">
                    <div class="lsvr-container">
                        <div class="footer-bottom__inner">
                            <!-- FOOTER SOCIAL LINKS : begin -->
                            <div class="footer-social">
                                <ul class="footer-social__list" title="Social Media Links">
                                    <li class="footer-social__item footer-social__item--facebook">
                                        <a class="footer-social__link footer-social__link--facebook" href="#facebook"
                                            target="_blank" title="Facebook">
                                            <span aria-hidden="true" class="footer-social__icon icon-facebook">
                                                <span class="screen-reader-text">
                                                    Facebook
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="footer-social__item footer-social__item--twitter">
                                        <a class="footer-social__link footer-social__link--twitter" href="#x"
                                            target="_blank" title="X">
                                            <span aria-hidden="true" class="footer-social__icon icon-x">
                                                <span class="screen-reader-text">
                                                    X
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="footer-social__item footer-social__item--youtube">
                                        <a class="footer-social__link footer-social__link--youtube" href="#youtube"
                                            target="_blank" title="YouTube">
                                            <span aria-hidden="true" class="footer-social__icon icon-youtube">
                                                <span class="screen-reader-text">
                                                    YouTube
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- FOOTER SOCIAL LINKS : end -->
                            <!-- FOOTER MENU : begin -->
                            <nav aria-label="Footer Menu" class="footer-menu">
                                <ul class="footer-menu__list" id="menu-footer-menu" role="menu">
                                    <li class="footer-menu__item footer-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item"
                                        role="presentation">
                                        <a class="footer-menu__item-link footer-menu__item-link--level-0"
                                            href="https://preview.lsvr.sk/townpress/" role="menuitem">
                                            Home
                                        </a>
                                    </li>
                                    <li class="footer-menu__item footer-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                        role="presentation">
                                        <a class="footer-menu__item-link footer-menu__item-link--level-0"
                                            href="http://docs.lsvr.sk/townpress.wp/" role="menuitem" target="_blank">
                                            Documentation
                                        </a>
                                    </li>
                                    <li class="footer-menu__item footer-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                        role="presentation">
                                        <a class="footer-menu__item-link footer-menu__item-link--level-0"
                                            href="https://themeforest.net/item/townpress-municipality-wordpress-theme/11490395"
                                            role="menuitem" target="_blank">
                                            Purchase
                                        </a>
                                    </li>
                                    <li class="footer-menu__item footer-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                        role="presentation">
                                        <a class="footer-menu__item-link footer-menu__item-link--level-0"
                                            href="https://preview.lsvr.sk/townpress/demo-credits/" role="menuitem">
                                            Demo Credits
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- FOOTER MENU : end -->
                            <!-- FOOTER TEXT : begin -->
                            <div class="footer-text">
                                <p>
                                    TownPress - Municipal WordPress Theme
                                </p>
                            </div>
                            <!-- FOOTER TEXT : end -->
                        </div>
                    </div>
                </div>
                <!-- FOOTER BOTTOM : end -->
            </div>
        </footer> --}}
        <!-- FOOTER : end -->
        <footer>
            <div class="container-fluid">
                <br>
                <div class="container mt-3">
                    <div class="footer-design row">
                        <div class="col-sm-3">
                            <a href="{{ route('privacy-policy') }}" class="">
                                Privacy Policy
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('terms-conditions') }}" class="">
                                Terms &amp; Conditions
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('refund-cancellation') }}">
                                Cancellations and Refund
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('about-us') }}">
                                About Us
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                </div>
                <p class="container"><br>
                    <b>Please read this disclaimer carefully before using our website. By accessing and using our
                        website,
                        you
                        agree to the terms and conditions stated in this disclaimer. </b> <br>

                    1. Copyright and Intellectual Property: <br> a) The content, design, graphics, and data presented on
                    this
                    website are protected by copyright and intellectual property laws. <br> b) Unauthorized use,
                    reproduction, or
                    distribution of any material from this website, whether free or paid, is strictly prohibited. <br>
                    2. Changes to Disclaimer: <br> a) We reserve the right to modify or update this disclaimer at any
                    time
                    without
                    prior notice. <br> b) Any changes will be effective immediately upon posting on the website.
                    By using our website, you acknowledge that you have read, understood, and agree to this
                    disclaimer
                    in
                    its entirety. If you do not agree with any part of this disclaimer, please refrain from using
                    our
                    website. For
                    any questions or clarifications, please contact us at query@prararag.in
                </p>
                <p id="demo">
                </p>
                <br>
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
