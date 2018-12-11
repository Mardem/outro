<?php $__env->startSection('showGerenciamento', 'show'); ?>
<?php $__env->startSection('activeOcorrencia', 'active'); ?>
<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('mensagem.update', ['id' => $mensagem->id])); ?>" method="post" id="form-send">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="<?php echo e(route('ocorrencia.index')); ?>">Gerenciamento</a>
                                <a class="breadcrumb-item"
                                   href="<?php echo e(route('ocorrencia.show', ['id' => $ocorrencia->id])); ?>">Ocorrência</a>
                                <span class="breadcrumb-item active">Atualizar mensagem</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mensagens</h4>
                        <p class="card-description">
                            Atualizar mensagens
                        </p>

                        <div class="form-group">

                            <label for="mensagem">Mensagem*</label>
                            <textarea class="form-control" id="mensagem" name="mensagem"
                                      placeholder="Digite a mensagem!" required><?php echo e($mensagem->mensagem); ?></textarea>

                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="observacao">Observação*</label>
                                <textarea class="form-control" id="observacao" name="observacao"
                                          placeholder="Digite uma observação!"
                                          required><?php echo e($mensagem->observacao); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar dados
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>