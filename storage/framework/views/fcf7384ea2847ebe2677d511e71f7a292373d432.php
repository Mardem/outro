<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeImages', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <nav class="breadcrumb mb-4">
        <a class="breadcrumb-item" href="<?php echo e(route('imagens.index')); ?>">Imagens</a>
        <span class="breadcrumb-item active">Cadastrar nova imagem</span>
    </nav>

    <form action="<?php echo e(route('imagens.store')); ?>" enctype="multipart/form-data" id="formImage" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vínculo</h4>
                        <p class="card-description">
                            Preencha os campos obrigatórios
                        </p>

                        <div class="form-group">
                            <label for="partner_id">Sócio*:</label>
                            <select name="partner_id" id="partner_id" class="form-control" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script>
        $(document).ready(function () {
            getPartners('<?php echo e(route('api.login')); ?>', '<?php echo e(route('jsonPartners')); ?>');
            let form = document.querySelector('#formImage');
            let btnSumit = document.querySelector('#submit');
            let files = document.querySelector('#files');

            files.addEventListener('change', function (e) {

                let data = 0;
                for(let i = 0; i < this.files.length; i++) {
                    data += this.files[i].size;
                }

                if (data > 625000) {

                    swal({
                        title: "Ops...",
                        text: "Os arquivos são maiores que o permitido. Até 5MB é permitido.",
                        icon: "error"
                    });

                    this.value = "";
                }
            });

            form.addEventListener('submit', function () {
                btnSumit.disabled = true;
                swal({
                    title: "Okay!",
                    text: "Aguarde enquanto suas imagens são enviadas.",
                    icon: "success"
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>