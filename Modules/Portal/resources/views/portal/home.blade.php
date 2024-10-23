<x-layout.portal.base>
      
        <div id="wrapper">
           
            <header class="header--has-languages header--has-map" id="header">
                <div class="header__inner">
                    <!-- HEADER MAP : begin -->
                    <div class="header-map header-map--loading header-map--gmaps">
                        <div class="header-map__canvas header-map__canvas--loading" data-latlong="44.465446,-72.687425"
                            data-map-platform="gmaps" data-map-provider="gmaps" data-maptype="hybrid"
                            data-mousewheel="false" data-zoom="17" id="header-map-canvas">
                        </div>
                        <span class="c-spinner">
                        </span>
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
                                            src="{{ asset('assets/portals/logos/logo.png') }}" />
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
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children"
                                                id="header-mobile-menu__item-226" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/"
                                                    id="header-mobile-menu__item-link-226" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Home
                                                    </span>
                                                </a>
                                                <button aria-controls="header-mobile-menu__submenu-226"
                                                    aria-expanded="false" aria-haspopup="true"
                                                    aria-label="Expand submenu"
                                                    class="header-mobile-menu__toggle header-mobile-menu__toggle--level-0"
                                                    id="header-mobile-menu__toggle-226" type="button">
                                                    <span aria-hidden="true" class="header-mobile-menu__toggle-icon">
                                                    </span>
                                                </button>
                                                <ul aria-expanded="false"
                                                    aria-labelledby="header-mobile-menu__item-link-226"
                                                    class="header-mobile-menu__submenu sub-menu header-mobile-menu__submenu--level-0"
                                                    id="header-mobile-menu__submenu-226" role="menu">
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item"
                                                        id="header-mobile-menu__item-227" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/"
                                                            id="header-mobile-menu__item-link-227" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Classic Home
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                        id="header-mobile-menu__item-225" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/magazine-home/"
                                                            id="header-mobile-menu__item-link-225" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Magazine Home
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                        id="header-mobile-menu__item-224" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/dashboard-home/"
                                                            id="header-mobile-menu__item-link-224" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Dashboard Home
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                id="header-mobile-menu__item-222" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/news/"
                                                    id="header-mobile-menu__item-link-222" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        News
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-229" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/notices/"
                                                    id="header-mobile-menu__item-link-229" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Notices
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-230" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/directory"
                                                    id="header-mobile-menu__item-link-230" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Directory
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-231" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/events"
                                                    id="header-mobile-menu__item-link-231" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Events
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-232" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/galleries"
                                                    id="header-mobile-menu__item-link-232" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Galleries
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-233" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/documents"
                                                    id="header-mobile-menu__item-link-233" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Documents
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-234" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/people"
                                                    id="header-mobile-menu__item-link-234" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        People
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                id="header-mobile-menu__item-343" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/forums/"
                                                    id="header-mobile-menu__item-link-343" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Forums
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="header-mobile-menu__item header-mobile-menu__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"
                                                id="header-mobile-menu__item-223" role="presentation">
                                                <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-0"
                                                    href="https://preview.lsvr.sk/townpress/typography/"
                                                    id="header-mobile-menu__item-link-223" role="menuitem">
                                                    <span class="header-mobile-menu__item-link-label">
                                                        Page Examples
                                                    </span>
                                                </a>
                                                <button aria-controls="header-mobile-menu__submenu-223"
                                                    aria-expanded="false" aria-haspopup="true"
                                                    aria-label="Expand submenu"
                                                    class="header-mobile-menu__toggle header-mobile-menu__toggle--level-0"
                                                    id="header-mobile-menu__toggle-223" type="button">
                                                    <span aria-hidden="true" class="header-mobile-menu__toggle-icon">
                                                    </span>
                                                </button>
                                                <ul aria-expanded="false"
                                                    aria-labelledby="header-mobile-menu__item-link-223"
                                                    class="header-mobile-menu__submenu sub-menu header-mobile-menu__submenu--level-0"
                                                    id="header-mobile-menu__submenu-223" role="menu">
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                        id="header-mobile-menu__item-451" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/contact/"
                                                            id="header-mobile-menu__item-link-451" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Contact
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                        id="header-mobile-menu__item-452" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/phone-numbers/"
                                                            id="header-mobile-menu__item-link-452" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Phone Numbers
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                        id="header-mobile-menu__item-228" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/typography/"
                                                            id="header-mobile-menu__item-link-228" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Typography
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-custom menu-item-object-custom"
                                                        id="header-mobile-menu__item-265" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/?s=town"
                                                            id="header-mobile-menu__item-link-265" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Search Results
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="header-mobile-menu__item header-mobile-menu__item--level-1 menu-item menu-item-type-custom menu-item-object-custom"
                                                        id="header-mobile-menu__item-266" role="presentation">
                                                        <a class="header-mobile-menu__item-link header-mobile-menu__item-link--level-1"
                                                            href="https://preview.lsvr.sk/townpress/404"
                                                            id="header-mobile-menu__item-link-266" role="menuitem">
                                                            <span class="header-mobile-menu__item-link-label">
                                                                Error 404
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
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
                    style="background-image: url('https://www.prarang.in/meerut/images/header-01.jpg'); ">
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
                                    <div
                                        class="columns__main lsvr-grid__col lsvr-grid__col--span-6 lsvr-grid__col--push-3">
                                        <!-- MAIN : begin -->
                                        <main id="main">
                                            <div class="main__inner">
                                                <div class="post-207 page type-page status-publish hentry">
                                                    <!-- MAIN HEADER : begin -->
                                                    <header class="main__header">
                                                        <h1 class="main__title m-0">
                                                          मेरठ - लघु उद्योग 'क्रांति' का शहर
                                                        </h1>
                                                    </header>
                                                    <!-- MAIN HEADER : end -->
                                                    <!-- PAGE CONTENT : begin -->
                                                    <div class="page__content">
                                                        <x-portal.posts-carousel  cityId="r4" cityCode="c3"/>
                                                        <!-- TOWNPRESS SITEMAP : begin -->
                                                      <x-portal.tag-list cityId="r4" cityCode="c3"/>
                                                     
    
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
                                                                            href="https://preview.lsvr.sk/townpress/"
                                                                            id="lsvr-townpress-menu-widget__item-link-226-251"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Home
                                                                            </span>
                                                                        </a>
                                                                        <button
                                                                            aria-controls="lsvr-townpress-menu-widget__submenu-226-251"
                                                                            aria-expanded="false" aria-haspopup="true"
                                                                            aria-label="Expand submenu"
                                                                            class="lsvr-townpress-menu-widget__toggle lsvr-townpress-menu-widget__toggle--level-0"
                                                                            type="button">
                                                                            <span aria-hidden="true"
                                                                                class="lsvr-townpress-menu-widget__toggle-icon">
                                                                            </span>
                                                                        </button>
                                                                        <ul aria-expanded="false"
                                                                            aria-labelledby="lsvr-townpress-menu-widget__item-link-226-251"
                                                                            class="lsvr-townpress-menu-widget__submenu lsvr-townpress-menu-widget__submenu--level-0"
                                                                            id="lsvr-townpress-menu-widget__submenu-226-251"
                                                                            role="menu">
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-207 current_page_item"
                                                                                id="lsvr-townpress-menu-widget__item-227-995"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-227-995"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Classic Home
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                                                id="lsvr-townpress-menu-widget__item-225-895"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/magazine-home/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-225-895"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Magazine Home
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                                                id="lsvr-townpress-menu-widget__item-224-415"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/dashboard-home/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-224-415"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Dashboard Home
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page"
                                                                        id="lsvr-townpress-menu-widget__item-222-830"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/news/"
                                                                            id="lsvr-townpress-menu-widget__item-link-222-830"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                News
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-229-136"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/notices/"
                                                                            id="lsvr-townpress-menu-widget__item-link-229-136"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Notices
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-230-274"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/directory"
                                                                            id="lsvr-townpress-menu-widget__item-link-230-274"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Directory
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-231-687"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/events"
                                                                            id="lsvr-townpress-menu-widget__item-link-231-687"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Events
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-232-55"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/galleries"
                                                                            id="lsvr-townpress-menu-widget__item-link-232-55"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Galleries
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-233-542"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/documents"
                                                                            id="lsvr-townpress-menu-widget__item-link-233-542"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Documents
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-234-588"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/people"
                                                                            id="lsvr-townpress-menu-widget__item-link-234-588"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                People
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-custom menu-item-object-custom"
                                                                        id="lsvr-townpress-menu-widget__item-343-282"
                                                                        role="presentation">
                                                                        <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/forums/"
                                                                            id="lsvr-townpress-menu-widget__item-link-343-282"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Forums
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"
                                                                        id="lsvr-townpress-menu-widget__item-223-293"
                                                                        role="presentation">
                                                                        <a aria-controls="lsvr-townpress-menu-widget__submenu-223-293"
                                                                            aria-expanded="false" aria-haspopup="true"
                                                                            aria-owns="lsvr-townpress-menu-widget__submenu-223-293"
                                                                            class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-0"
                                                                            href="https://preview.lsvr.sk/townpress/typography/"
                                                                            id="lsvr-townpress-menu-widget__item-link-223-293"
                                                                            role="menuitem">
                                                                            <span
                                                                                class="lsvr-townpress-menu-widget__item-link-label">
                                                                                Page Examples
                                                                            </span>
                                                                        </a>
                                                                        <button
                                                                            aria-controls="lsvr-townpress-menu-widget__submenu-223-293"
                                                                            aria-expanded="false" aria-haspopup="true"
                                                                            aria-label="Expand submenu"
                                                                            class="lsvr-townpress-menu-widget__toggle lsvr-townpress-menu-widget__toggle--level-0"
                                                                            type="button">
                                                                            <span aria-hidden="true"
                                                                                class="lsvr-townpress-menu-widget__toggle-icon">
                                                                            </span>
                                                                        </button>
                                                                        <ul aria-expanded="false"
                                                                            aria-labelledby="lsvr-townpress-menu-widget__item-link-223-293"
                                                                            class="lsvr-townpress-menu-widget__submenu lsvr-townpress-menu-widget__submenu--level-0"
                                                                            id="lsvr-townpress-menu-widget__submenu-223-293"
                                                                            role="menu">
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                                                id="lsvr-townpress-menu-widget__item-451-288"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/contact/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-451-288"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Contact
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                                                id="lsvr-townpress-menu-widget__item-452-995"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/phone-numbers/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-452-995"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Phone Numbers
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-post_type menu-item-object-page"
                                                                                id="lsvr-townpress-menu-widget__item-228-731"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/typography/"
                                                                                    id="lsvr-townpress-menu-widget__item-link-228-731"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Typography
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-custom menu-item-object-custom"
                                                                                id="lsvr-townpress-menu-widget__item-265-204"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/?s=town"
                                                                                    id="lsvr-townpress-menu-widget__item-link-265-204"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Search Results
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="lsvr-townpress-menu-widget__item lsvr-townpress-menu-widget__item--level-1 menu-item menu-item-type-custom menu-item-object-custom"
                                                                                id="lsvr-townpress-menu-widget__item-266-145"
                                                                                role="presentation">
                                                                                <a class="lsvr-townpress-menu-widget__item-link lsvr-townpress-menu-widget__item-link--level-1"
                                                                                    href="https://preview.lsvr.sk/townpress/404"
                                                                                    id="lsvr-townpress-menu-widget__item-link-266-145"
                                                                                    role="menuitem">
                                                                                    <span
                                                                                        class="lsvr-townpress-menu-widget__item-link-label">
                                                                                        Error 404
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget lsvr-townpress-weather-widget lsvr-townpress-weather-widget--has-background"
                                                    id="lsvr_townpress_weather-2">
                                                    <div class="widget__inner"
                                                        style="background-image: url(https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/locale-widget-bg.jpg);">
                                                        <h3 class="widget__title widget__title--has-icon">
                                                            <span aria-hidden="true"
                                                                class="widget__title-icon icon-cloud-sun">
                                                            </span>
                                                            Weather Info
                                                        </h3>
                                                        <div class="widget__content">
                                                            <div class="lsvr-townpress-weather-widget__time">
                                                                <h4 class="lsvr-townpress-weather-widget__time-title">
                                                                    Local Time
                                                                </h4>
                                                                <p class="lsvr-townpress-weather-widget__time-value"
                                                                    data-timezone="">
                                                                    6:43 am
                                                                </p>
                                                            </div>
                                                            <div class="lsvr-townpress-weather-widget__weather lsvr-townpress-weather-widget__weather--loading"
                                                                data-ajax-params='{"address":"stowe,us","latitude":"","longitude":"","forecast_length":2,"units_format":"metric","update_interval":"3hours"}'
                                                                data-forecast-length="2">
                                                                <span
                                                                    class="lsvr-townpress-weather-widget__weather-spinner c-spinner">
                                                                </span>
                                                                <ul class="lsvr-townpress-weather-widget__weather-list"
                                                                    style="display: none;">
                                                                    <li
                                                                        class="lsvr-townpress-weather-widget__weather-item lsvr-townpress-weather-widget__weather-item--current">
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-labels">
                                                                            <h4
                                                                                class="lsvr-townpress-weather-widget__weather-item-title">
                                                                                Today
                                                                            </h4>
                                                                            <h5
                                                                                class="lsvr-townpress-weather-widget__weather-item-date">
                                                                                October 11, 2024
                                                                            </h5>
                                                                        </div>
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-values">
                                                                            <span aria-hidden="true"
                                                                                class="lsvr-townpress-weather-widget__weather-item-icon">
                                                                            </span>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-temperature"
                                                                                title="Temperature">
                                                                                °C
                                                                            </div>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-wind"
                                                                                title="Wind speed">
                                                                                m/s
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="lsvr-townpress-weather-widget__weather-item lsvr-townpress-weather-widget__weather-item--forecast lsvr-townpress-weather-widget__weather-item--forecast-1"
                                                                        data-timestamp="1728734400">
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-labels">
                                                                            <h4
                                                                                class="lsvr-townpress-weather-widget__weather-item-title">
                                                                                Saturday
                                                                            </h4>
                                                                            <h5
                                                                                class="lsvr-townpress-weather-widget__weather-item-date">
                                                                                October 12, 2024
                                                                            </h5>
                                                                        </div>
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-values">
                                                                            <span aria-hidden="true"
                                                                                class="lsvr-townpress-weather-widget__weather-item-icon">
                                                                            </span>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-temperature"
                                                                                title="Temperature">
                                                                                °C
                                                                            </div>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-wind"
                                                                                title="Wind speed">
                                                                                m/s
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="lsvr-townpress-weather-widget__weather-item lsvr-townpress-weather-widget__weather-item--forecast lsvr-townpress-weather-widget__weather-item--forecast-2"
                                                                        data-timestamp="1728820800">
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-labels">
                                                                            <h4
                                                                                class="lsvr-townpress-weather-widget__weather-item-title">
                                                                                Sunday
                                                                            </h4>
                                                                            <h5
                                                                                class="lsvr-townpress-weather-widget__weather-item-date">
                                                                                October 13, 2024
                                                                            </h5>
                                                                        </div>
                                                                        <div
                                                                            class="lsvr-townpress-weather-widget__weather-item-values">
                                                                            <span aria-hidden="true"
                                                                                class="lsvr-townpress-weather-widget__weather-item-icon">
                                                                            </span>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-temperature"
                                                                                title="Temperature">
                                                                                °C
                                                                            </div>
                                                                            <div class="lsvr-townpress-weather-widget__weather-item-wind"
                                                                                title="Wind speed">
                                                                                m/s
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="lsvr-townpress-weather-widget__text">
                                                                <p>
                                                                    <em>
                                                                        Weather data by
                                                                        <strong>
                                                                            <a href="http://openweathermap.org"
                                                                                target="_blank">
                                                                                OpenWeatherMap.org
                                                                            </a>
                                                                        </strong>
                                                                    </em>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget lsvr_gallery-featured-widget"
                                                    id="lsvr_galleries_gallery_featured-2">
                                                    <div class="widget__inner">
                                                        <h3 class="widget__title widget__title--has-icon">
                                                            <span aria-hidden="true"
                                                                class="widget__title-icon icon-image">
                                                            </span>
                                                            Featured Gallery
                                                        </h3>
                                                        <div class="widget__content lsvr_gallery-featured-widget__content">
                                                            <p class="lsvr_gallery-featured-widget__thumb">
                                                                <a class="lsvr_gallery-featured-widget__thumb-link"
                                                                    href="https://preview.lsvr.sk/townpress/galleries/streets-of-townpress/">
                                                                    <img alt="town-02-large"
                                                                        src="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/town-02-large-600x360.jpg"
                                                                        title="" />
                                                                </a>
                                                            </p>
                                                            <div class="lsvr_gallery-featured-widget__content-inner">
                                                                <h4 class="lsvr_gallery-featured-widget__title">
                                                                    <a class="lsvr_gallery-featured-widget__title-link"
                                                                        href="https://preview.lsvr.sk/townpress/galleries/streets-of-townpress/">
                                                                        Streets of TownPress
                                                                    </a>
                                                                </h4>
                                                                <p class="lsvr_gallery-featured-widget__date">
                                                                    November 17, 2018
                                                                </p>
                                                                <p class="widget__more">
                                                                    <a class="widget__more-link"
                                                                        href="https://preview.lsvr.sk/townpress/galleries/">
                                                                        More Galleries
                                                                    </a>
                                                                </p>
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
    
                                                <div class="widget text-center">
                                                    <div id="openweathermap-widget-15"></div>
                                                    <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 15,cityid: '1263214',appid: '56f588215d2d5d31ddef488123660610',units: 'metric',containerid: 'openweathermap-widget-15',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
                                                </div>
                                                <div class="widget lsvr_notice-list-widget"
                                                    id="lsvr_notices_notice_list-2">
                                                    <div class="widget__inner">
                                                        <h3 class="widget__title widget__title--has-icon">
                                                            <span aria-hidden="true"
                                                                class="widget__title-icon icon-bullhorn">
                                                            </span>
                                                            Notices
                                                        </h3>
                                                        <div class="widget__content">
                                                            <ul class="lsvr_notice-list-widget__list">
                                                                <li class="lsvr_notice-list-widget__item">
                                                                    <h4 class="lsvr_notice-list-widget__item-title">
                                                                        <a class="lsvr_notice-list-widget__item-title-link"
                                                                            href="https://preview.lsvr.sk/townpress/notices/soccer-tournament-timetable/">
                                                                            Soccer Tournament Timetable
                                                                        </a>
                                                                    </h4>
                                                                    <ul class="lsvr_notice-list-widget__item-meta">
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--date">
                                                                            June 1, 2021
                                                                        </li>
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--category">
                                                                            in
                                                                            <a class="lsvr_notice-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/notice-category/sport/">
                                                                                Sport
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="lsvr_notice-list-widget__item">
                                                                    <h4 class="lsvr_notice-list-widget__item-title">
                                                                        <a class="lsvr_notice-list-widget__item-title-link"
                                                                            href="https://preview.lsvr.sk/townpress/notices/annual-marathon-registration/">
                                                                            Annual Marathon Registration
                                                                        </a>
                                                                    </h4>
                                                                    <ul class="lsvr_notice-list-widget__item-meta">
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--date">
                                                                            May 28, 2021
                                                                        </li>
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--category">
                                                                            in
                                                                            <a class="lsvr_notice-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/notice-category/sport/">
                                                                                Sport
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="lsvr_notice-list-widget__item">
                                                                    <h4 class="lsvr_notice-list-widget__item-title">
                                                                        <a class="lsvr_notice-list-widget__item-title-link"
                                                                            href="https://preview.lsvr.sk/townpress/notices/traffic-safety-notice/">
                                                                            Traffic Safety Notice
                                                                        </a>
                                                                    </h4>
                                                                    <ul class="lsvr_notice-list-widget__item-meta">
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--date">
                                                                            May 23, 2021
                                                                        </li>
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--category">
                                                                            in
                                                                            <a class="lsvr_notice-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/notice-category/comunity/">
                                                                                Comunity
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="lsvr_notice-list-widget__item">
                                                                    <h4 class="lsvr_notice-list-widget__item-title">
                                                                        <a class="lsvr_notice-list-widget__item-title-link"
                                                                            href="https://preview.lsvr.sk/townpress/notices/upcoming-public-meetings/">
                                                                            Upcoming Public Meetings
                                                                        </a>
                                                                    </h4>
                                                                    <ul class="lsvr_notice-list-widget__item-meta">
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--date">
                                                                            May 15, 2021
                                                                        </li>
                                                                        <li
                                                                            class="lsvr_notice-list-widget__item-meta-item lsvr_notice-list-widget__item-meta-item--category">
                                                                            in
                                                                            <a class="lsvr_notice-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/notice-category/comunity/">
                                                                                Comunity
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <p class="widget__more">
                                                                <a class="widget__more-link"
                                                                    href="https://preview.lsvr.sk/townpress/notices/">
                                                                    More Notices
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget widget_media_image" id="media_image-2">
                                                    <div class="widget__inner">
                                                        <a href="https://preview.lsvr.sk/townpress/">
                                                            <img alt="poster-01"
                                                                class="image wp-image-347 attachment-full size-full"
                                                                decoding="async" height="882" loading="lazy"
                                                                sizes="(max-width: 600px) 100vw, 600px"
                                                                src="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/poster-01.jpg"
                                                                srcset="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/poster-01.jpg 600w, https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/poster-01-408x600.jpg 408w"
                                                                style="max-width: 100%; height: auto;" width="600" />
                                                        </a>
                                                    </div>
                                                </div>                                          
                                                <div class="widget lsvr_listing-list-widget"
                                                    id="lsvr_directory_listing_list-2">
                                                    <div class="widget__inner">
                                                        <h3 class="widget__title widget__title--has-icon">
                                                            <span aria-hidden="true"
                                                                class="widget__title-icon icon-map-marker">
                                                            </span>
                                                            Interesting Places
                                                        </h3>
                                                        <div class="widget__content lsvr_listing-list-widget__content">
                                                            <ul class="lsvr_listing-list-widget__list">
                                                                <li
                                                                    class="lsvr_listing-list-widget__item lsvr_listing-list-widget__item--has-thumb">
                                                                    <p class="lsvr_listing-list-widget__item-thumb">
                                                                        <a class="lsvr_listing-list-widget__item-thumb-link"
                                                                            href="https://preview.lsvr.sk/townpress/directory/high-school/">
                                                                            <img alt="White-Bird-Inn"
                                                                                class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                decoding="async" height="300"
                                                                                loading="lazy"
                                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                                src="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/White-Bird-Inn-300x300.jpg"
                                                                                srcset="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/White-Bird-Inn-300x300.jpg 300w, https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/White-Bird-Inn-100x100.jpg 100w"
                                                                                width="300">
                                                                            </img>
                                                                        </a>
                                                                    </p>
                                                                    <div class="lsvr_listing-list-widget__item-content">
                                                                        <h4 class="lsvr_listing-list-widget__item-title">
                                                                            <a class="lsvr_listing-list-widget__item-title-link"
                                                                                href="https://preview.lsvr.sk/townpress/directory/high-school/">
                                                                                High School
                                                                            </a>
                                                                        </h4>
                                                                        <p class="lsvr_listing-list-widget__item-address"
                                                                            title="Address">
                                                                            28 School St,
                                                                            <br>
                                                                            TownPress, VT 24346
                                                                            </br>
                                                                        </p>
                                                                        <p class="lsvr_listing-list-widget__item-category"
                                                                            title="Category">
                                                                            in
                                                                            <a class="lsvr_listing-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/directory-category/education/">
                                                                                Education
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="lsvr_listing-list-widget__item lsvr_listing-list-widget__item--has-thumb">
                                                                    <p class="lsvr_listing-list-widget__item-thumb">
                                                                        <a class="lsvr_listing-list-widget__item-thumb-link"
                                                                            href="https://preview.lsvr.sk/townpress/directory/downtown-cinema/">
                                                                            <img alt="Cinema"
                                                                                class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                decoding="async" height="300"
                                                                                loading="lazy"
                                                                                sizes="(max-width: 300px) 100vw, 300px"
                                                                                src="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/Cinema-300x300.jpg"
                                                                                srcset="https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/Cinema-300x300.jpg 300w, https://preview.lsvr.sk/townpress/wp-content/uploads/sites/3/2017/12/Cinema-100x100.jpg 100w"
                                                                                width="300" />
                                                                        </a>
                                                                    </p>
                                                                    <div class="lsvr_listing-list-widget__item-content">
                                                                        <h4 class="lsvr_listing-list-widget__item-title">
                                                                            <a class="lsvr_listing-list-widget__item-title-link"
                                                                                href="https://preview.lsvr.sk/townpress/directory/downtown-cinema/">
                                                                                Downtown Cinema
                                                                            </a>
                                                                        </h4>
                                                                        <p class="lsvr_listing-list-widget__item-address"
                                                                            title="Address">
                                                                            279 Main St,
                                                                            <br />
                                                                            TownPress, VT 24346
                                                                        </p>
                                                                        <p class="lsvr_listing-list-widget__item-category"
                                                                            title="Category">
                                                                            in
                                                                            <a class="lsvr_listing-list-widget__item-category-link"
                                                                                href="https://preview.lsvr.sk/townpress/directory-category/entertainment/">
                                                                                Entertainment
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <p class="widget__more">
                                                                <a class="widget__more-link"
                                                                    href="https://preview.lsvr.sk/townpress/directory/">
                                                                    More Listings
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
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
            <footer class="footer--has-background" id="footer"
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
                                                            TownPress is a premium Municipality WordPress theme. It is best
                                                            suited to be used as a presentation site for small to medium
                                                            towns. You will find an extensive list of features to help
                                                            create the website your town needs!
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
            </footer>
            <!-- FOOTER : end -->
        </div>
     
      
      

</x-layout.portal.base>