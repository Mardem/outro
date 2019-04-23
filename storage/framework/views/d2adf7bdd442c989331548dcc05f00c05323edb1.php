<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeImages', 'active'); ?>
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb mb-3">
            <a class="breadcrumb-item" href="<?php echo e(route('imagens.index')); ?>">Imagens</a>
        <span class="breadcrumb-item active">Visualizando imagens de <b><?php echo e($image->partner->nome); ?></b></span>
    </nav>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <strong>Imagens enviadas</strong>
                    <div class="row">
                        <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-3">
                                <div class="card">

                                    <div class="card-body">
                                        <p class="card-text">
                                            Imagem inserida em <?php echo e($url->date_created_formated); ?>

                                        </p>
                                        <a href="<?php echo e($url->link_dropbox); ?>" class="btn btn-primary" target="_blank">Abrir link</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>