<?php $__env->startSection('dashActive', 'active'); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description lead text-center">
                        Olá, <b class="text-primary"><?php echo e(Auth::user()->name); ?></b> para a sua segurança digite a sua senha abaixo.
                    </p>

                    <form action="<?php echo e(route('updateToken')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
                        <button class="btn btn-outline-success mt-2">Confirmar</button>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>