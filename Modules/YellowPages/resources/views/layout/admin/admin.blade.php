@include('yellowpages::layout.partial.head')
<!-- header -->
@include('yellowpages::layout.partial.navbar')
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        @include('yellowpages::layout.partial.sidebar')
    </div>
    <!-- end sidebar wrapper -->

    <div class="page-wrapper">
        
        @yield('content')
        @include('yellowpages::layout.partial.footer')

    </div>

</div>
@include('yellowpages::layout.partial.script')

