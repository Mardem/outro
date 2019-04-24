<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeImages', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="offset-sm-0 offset-md-3 col-sm-12 col-md-5 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-image text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">Imagens <br>cadastradas</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas imagens cadastradas
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">

                    <form action="<?php echo e(route('imagens.search')); ?>" method="get" class="form-inline mt-2 mb-4">
                        <input type="text" name="search" class="form-control w-25 mr-1"
                               placeholder=" Digite a sua busca">
                        <button class="btn btn-primary">Pesquisar</button>
                    </form>

                    <h4 class="card-title">Imagens</h4>
                    <p class="card-description">
                        Veja e apague os imagens do sistema.
                    </p>
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            <td>Sócio</td>
                            <td>Criação</td>
                            <td>Ações</td>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($image->id); ?></td>
                                <td><?php echo e($image->partner->nome); ?></td>
                                <td><?php echo e($image->date_formated); ?></td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </a>

                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-divider mb-0"></div>
                                            <a class="dropdown-item text-primary p-2" href="<?php echo e(route('imagens.show', $image->getKey())); ?>">Ver</a>
                                            <div class="dropdown-divider mb-0 mt-0"></div>

                                            <form action="<?php echo e(route('imagens.destroy', $image->getKey())); ?>"
                                                  method="post">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button class="dropdown-item text-danger p-2" href="#">Apagar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <?php echo e($images->links()); ?>


                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>