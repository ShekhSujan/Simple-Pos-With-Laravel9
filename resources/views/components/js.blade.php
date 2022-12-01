<!-- Required jQuery first, then Bootstrap Bundle JS -->

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
<script src="{{asset('assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/daterange/daterange.js')}}"></script>
<script src="{{asset('assets/vendor/daterange/custom-daterange.js')}}"></script>
<script src="{{asset('assets/vendor/polyfill/polyfill.min.js')}}"></script>
{{-- <script src="{{asset("assets/vendor/apex/apexcharts.min.js")}}"></script> --}}
<script src="{{asset('assets/vendor/apex/admin/visitors.js')}}"></script>
<script src="{{asset('assets/vendor/apex/examples/bar/basic-bar-negative-values.js')}}"></script>
<script src="{{asset("assets/vendor/morris/raphael-min.js")}}"></script>
<script src="{{asset("assets/vendor/morris/morris.min.js")}}"></script>
<script src="{{asset('assets/vendor/apex/admin/deals.js')}}"></script>
<script src="{{asset('assets/vendor/apex/admin/income.js')}}"></script>
<script src="{{asset('assets/vendor/apex/admin/customers.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<!-- Data Tables -->
<script src="{{asset('assets/vendor/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- Custom Data tables -->
<script src="{{asset('assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/custom/fixedHeader.js')}}"></script>
<script src="{{asset('assets/vendor/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/vendor/input-tags/tagsinput-custom.js')}}"></script>
<script src="{{asset('assets/vendor/input-tags/tagsinput.min.js')}}"></script>
<script src="{{asset('assets/vendor/input-tags/typeahead.js')}}"></script>

<script src="{{asset('assets/vendor/bs-select/bs-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/vendor/notify/notify.js')}}"></script>

<!-- Download / CSV / Copy / Print -->
<script src="{{asset('assets/vendor/datatables/buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/buttons.print.min.js')}}"></script>
<!-- Fullcalendar -->
<script src="{{asset('assets/vendor/calendar/js/core/main.min.js')}}"></script>
<script src="{{asset('assets/vendor/calendar/js/daygrid/main.min.js')}}"></script>
<script src="{{asset('assets/vendor/fileuploads/js/fileupload.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });
    });

</script>

<script src="{{asset('assets/toastr/toastr.min.js')}}"></script>

{!! Toastr::message() !!}
