{{-- Axios.js --}}
<script src="{{ asset('backend/custom_downloaded_file/axios.min.js') }}"></script>

{{-- moment.min.js --}}
<script src="{{ asset('backend/custom_downloaded_file/moment.min.js') }}"></script>

{{-- JQUERY JS --}}
{{-- <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- BOOTSTRAP JS --}}
<script src="{{ asset('backend/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

{{-- SIDE-MENU JS --}}
<script src="{{ asset('backend/plugins/sidemenu/sidemenu.js') }}"></script>

{{-- Perfect SCROLLBAR JS --}}
<script src="{{ asset('backend/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/plugins/p-scroll/pscroll.js') }}"></script>

{{-- STICKY JS --}}
<script src="{{ asset('backend/js/sticky.js') }}"></script>

{{-- INTERNAL Summernote Editor js --}}
<script src="{{ asset('backend/plugins/summernote-editor/summernote1.js') }}"></script>
<script src="{{ asset('backend/js/summernote.js') }}"></script>

{{-- dropify js --}}
<script src="{{ asset('backend/js/dropify.min.js') }}"></script>

{{-- toaster js --}}
<script src="{{ asset('backend/js/toastr.min.js') }}"></script>

<!-- Ckeditor js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/41.3.1/ckeditor.min.js"></script>

{{-- DATA TABLE JS --}}
{{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script> --}}
<script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/butsns.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/butsns.html5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/js/table-data.js') }}"></script>

{{-- select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- APEXCHART JS --}}
<script src="{{ asset('backend/js/apexcharts.js') }}"></script>

{{-- INTERNAL SELECT2 JS --}}
<script src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>

{{-- CHART-CIRCLE JS --}}
<script src="{{ asset('backend/plugins/circle-progress/circle-progress.min.js') }}"></script>

{{-- INDEX JS --}}
<script src="{{ asset('backend/js/index1.js') }}"></script>
<script src="{{ asset('backend/js/index.js') }}"></script>

{{-- Reply JS --}}
<script src="{{ asset('backend/js/reply.js') }}"></script>

{{-- COLOR THEME JS --}}
<script src="{{ asset('backend/js/themeColors.js') }}"></script>

{{-- CUSTOM JS --}}
<script src="{{ asset('backend/js/custom.js') }}"></script>

{{-- SWITCHER JS --}}
<script src="{{ asset('backend/switcher/js/switcher.js') }}"></script>

{{-- SweetAlert2 JS --}}
<script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>

{{-- Ckeditor.js --}}
<script src="{{ asset('backend/custom_downloaded_file/ckeditor.js') }}"></script>
 <!-- Bootstrap Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

{{-- toastr start --}}
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        toastr.options.positionClass = 'toast-top-right';

        @if (Session::has('t-success'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.success("{{ session('t-success') }}");
        @endif

        @if (Session::has('t-error'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.error("{{ session('t-error') }}");
        @endif

        @if (Session::has('t-info'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.info("{{ session('t-info') }}");
        @endif

        @if (Session::has('t-warning'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.warning("{{ session('t-warning') }}");
        @endif
    });
</script>
{{-- toastr end --}}

{{-- dropify start --}}
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
{{-- dropify end --}}

{{-- summernot start --}}
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 220,
        });
    });
</script>
{{-- summetnote end --}}

@stack('scripts')