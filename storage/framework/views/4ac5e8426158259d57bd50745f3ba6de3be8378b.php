<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendors/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendors/js/vendor.bundle.addons.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.inputmask.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="<?php echo e(asset('js/jquery.autocomplete.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jQuery.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/datepicker.pt-BR.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="<?php echo e(asset("js/multiple-select.js")); ?>"></script>

<?php echo $__env->make('layouts.components.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<!-- End custom js for this page-->

<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>