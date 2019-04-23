<?php $__env->startSection('showGerenciamento', 'show'); ?>
<?php $__env->startSection('activeOcorrencia', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-user text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total de ocorrências</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo e($ocorrencias); ?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas ocorrências cadastrados
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <span style="float: right;">
                        <a href="<?php echo e(route('ocorrencia.create')); ?>" class="btn btn-outline-primary">Nova ocorrência</a>
                    </span>
                    <h4 class="card-title">Ocorrências</h4>
                    <p class="card-description">
                        Veja, edite e apague as ocorrências do sistema.
                    </p>

                    <table id="tableDataTable" class="table table-striped table-bordered"></table>
                    <form action="" method="post" class="hidden" id="deleteData">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/dataTable/css/jquery.dataTables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <script src="<?php echo e(asset('js/ziggy.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/helper.js')); ?>"></script>

    <script>

        let ver = "<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm'>Ver</a>";

                <?php if(\Auth::user()->category == 1): ?>
        let apagar = "<a href='javascript:void(0);' class='btn btn-outline-danger btn-sm'>Apagar</a>";
                <?php else: ?>
        let apagar = "<a href='javascript:void(0);' class='btn btn-outline-danger btn-sm' style='display: none;'></a>";
                <?php endif; ?>


        let columns = [
            {data: 'id'},
            {data: 'socio.nome', title: 'Sócio'},
            {
                data: 'data_ocorrencia',
                title: 'Data da Última Ocorrência',
                "render": function (data) {
                    return convertDateToBR(data);
                }
            },
            {
                data: null,
                title: 'Ações',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html(ver + apagar);
                }
            }
        ];
        jsonDataTables("<?php echo e(route('jsonOccurrencies')); ?>", "<?php echo e(\Auth::user()->token); ?>", columns, 'ocorrencia');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>