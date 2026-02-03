@include('yellowpages::layout.vcardpartial.head')
<!-- header -->
@include('yellowpages::layout.vcardpartial.navbar')
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        @include('yellowpages::layout.vcardpartial.sidebar')
    </div>
    <!-- end sidebar wrapper -->

    <div class="page-wrapper">
        @yield('content')
        @include('yellowpages::layout.vcardpartial.footer')
    </div>

</div>
@include('yellowpages::layout.vcardpartial.script')
