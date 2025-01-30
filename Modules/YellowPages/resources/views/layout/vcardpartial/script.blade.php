    <!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script> --}}
	<script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/ckeditor/build-config.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/ckeditor/config.js') }}"></script> --}}

    <script src="{{ asset('assets/js/custom/ckeditor.js') }}"></script>

	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        const mobileToggleMenu = document.querySelector('.mobile-toggle-menu');
        const sidebarWrapper = document.querySelector('.sidebar-wrapper');
        const closeSidebarBtn = document.querySelector('.close-sidebar');

        // Toggle sidebar when clicking the menu button
        mobileToggleMenu.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent bubbling
            sidebarWrapper.classList.toggle('active');
        });

        // Close sidebar when clicking the close button
        closeSidebarBtn.addEventListener('click', function() {
            sidebarWrapper.classList.remove('active');
        });

        // Close sidebar when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!sidebarWrapper.contains(event.target) && !mobileToggleMenu.contains(event.target)) {
                sidebarWrapper.classList.remove('active');
            }
        });
    });

</script>


	
	<script src="{{ asset('assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/login.js') }}"></script>
	@stack('scripts')

</body>
</html>
