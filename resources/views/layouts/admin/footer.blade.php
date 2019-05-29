<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>

<script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="{{ asset('js/jquery.autocomplete.min.js') }}"></script>
<script src="{{ asset('js/jQuery.print.min.js') }}"></script>
<script src="{{ asset('js/datepicker.min.js') }}"></script>
<script src="{{ asset('js/datepicker.pt-BR.js') }}"></script>
<script src="{{ asset("js/multiple-select.js") }}"></script>

@include('layouts.components.alerts')

<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page-->

@yield('scripts')

</body>

</html>
