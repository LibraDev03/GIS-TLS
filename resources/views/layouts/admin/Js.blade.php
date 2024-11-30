<script src="{{asset('adminDb/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminDb/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminDb/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminDb/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminDb/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminDb/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminDb/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminDb/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminDb/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminDb/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminDb/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminDb/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminDb/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminDb/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminDb/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminDb/dist/js/pages/dashboard.js')}}"></script>

{{-- toast cho he thong --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

@if (Session::has('suc'))
<script>
     $.toast({
         heading: 'Thông báo tới bạn !!!',
         text : '{{session::get('suc')}}',
         showHideTransition: 'slide',
         position: 'top-right',
         hideAfter: 3000,
         icon: 'success'
     })
 </script>
@endif

@if (Session::has('fail'))
 <script>
     $.toast({
         heading: 'Thông báo tới bạn !!!',  
         text : '{{session::get('fail')}}',
         showHideTransition: 'slide',
         position: 'top-right',
         hideAfter: 3000,
         icon: 'error'
     })
 </script>
@endif