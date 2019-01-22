<?php $__env->startSection('showGerenciamento', 'show'); ?>
<?php $__env->startSection('activeOcorrencia', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <input type="hidden" id="userIDSelect">

    <form action="<?php echo e(route('ocorrencia.store')); ?>" method="post" id="form-send">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="<?php echo e(route('ocorrencia.index')); ?>">Gerenciamento</a>
                                <span class="breadcrumb-item active">Cadastrar nova ocorrência</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dados ocorrências</h4>
                        <p class="card-description">
                            Preencha os campos com dados da ocorrência
                        </p>

                        <div class="form-group">
                            <?php if($request->has('id') && $request->has('name')): ?>
                                <label for="socios" style="font-size: 20px">Sócio selecionado <b><?php echo e($request->name); ?></b></label>
                                <input type="hidden" id="socios" name="socio_id" value="<?php echo e($request->id); ?>">
                            <?php else: ?>
                                <label for="socios">Sócio*:</label>
                                <select id="socios" name="socio_id" required>
                                    <option disabled>Selecione o sócio</option>
                                </select>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contato</h4>
                        <p class="card-description">
                            Preencha os campos com os dados do contato
                        </p>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="tipo">Título*:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Digite o título!" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="situacao">Situação*:</label>
                            <select name="situacao" id="situacao" class="form-control" required>
                                <option value="1">Resolvido</option>
                                <option value="2">Não Resolvido</option>
                                <option value="3">Agendado</option>
                            </select>
                        </div>

                        <div class="form-group" id="data_hora" style="display: none;">

                            <label for="data_hora">Data do Contato*</label>
                            <input type="text" class="span2 form-control" id="dpn" name="data_hora"
                                   autocomplete="off">
                        </div>


                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo e(asset('js/admin/datepicker/foundation-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/ocorrencia.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#data_ocorrencia').datepicker({
                language: 'pt-BR'
            });

            $('#socios').select2({
                ajax: {
                    headers: {
                        "Authorization": "Bearer <?php echo e(\Auth::user()->token); ?>",
                        "Content-Type": "application/json",
                    },
                    url: '<?php echo e(route('jsonPartners')); ?>',
                    data: function (params) {
                        return {
                            socio: params.term
                        }
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(function (socio) {
                                return {id: socio.id, text: socio.nome, user_id: socio.user_id}
                            })
                        }
                    }
                }
            }).on('select2:select', function (e) {
                let data = e.params.data;
                $('#userIDSelect').val(data.user_id);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>