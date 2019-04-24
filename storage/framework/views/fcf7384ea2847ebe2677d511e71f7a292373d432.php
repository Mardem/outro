<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeImages', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <nav class="breadcrumb mb-4">
        <a class="breadcrumb-item" href="<?php echo e(route('imagens.index')); ?>">Imagens</a>
        <span class="breadcrumb-item active">Cadastrar nova imagem</span>
    </nav>

    <form action="<?php echo e(route('imagens.store')); ?>" enctype="multipart/form-data" id="formImage" method="post">
        <?php echo csrf_field(); ?>
        <input name="partner_id" id="partner_id" class="form-control" value="<?php echo e(request()->get('partner_id')); ?>" type="hidden">
        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload</h4>
                        <p class="card-description">
                            Adicione as imagens neste local
                        </p>
                        <input type="file" id="files" name="images[]" class="form-control" multiple>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" id="submit" type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="<?php echo e(asset('js/admin/helpers/getPartners.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/validateUpload.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>