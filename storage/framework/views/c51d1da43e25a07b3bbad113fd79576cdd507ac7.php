<?php $__env->startSection('showGerenciamento', 'show'); ?>
<?php $__env->startSection('activeOcorrencia', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div id="print">
        <form action="<?php echo e(route('ocorrencia.update', ['id' => $ocorrencia->id])); ?>" method="post" id="form-send">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row no-print">
                <div class="col-sm-12 grid-margin-strech-card mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="cad-title">
                                <nav class="breadcrumb" style="margin: 0">
                                    <a class="breadcrumb-item" href="<?php echo e(route('ocorrencia.index')); ?>">Gerenciamento</a>
                                    <span class="breadcrumb-item active">Atualizar ocorrência</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mb-2 no-print">
                <div class="container">
            <span class="float-right" style="margin-right:10px;margin-bottom: 5px;">
                    <button type="button" class="btn btn-primary btn-sm" id="printOccurrence">
                        Imprimir
                    </button>
            </span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 grid-margin strech-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Dados da ocorrência</h4>
                            <p class="card-description no-print">
                                Preencha os campos com dados da ocorrência
                            </p>


                            <div class="form-group">
                                <label for="socio_id">Sócio*:</label>
                                <select id="socio_id" name="socio_id" class="form-control" required>

                                    <option disabled>Selecionado:</option>
                                    <option value="<?php echo e($ocorrencia->socio_id); ?>"><?php echo e($ocorrencia->socio->nome); ?></option>

                                </select>
                            </div>

                            <?php
                               $ocDate = new Date($ocorrencia->data_ocorrencia);
                            ?>
                            <div class="form-group">
                                <label for="data_ocorrencia">Data Ocorrência*:</label>
                                <input type="text" class="form-control" id="data_ocorrencia" disabled
                                       value="<?php echo e($ocDate->format('d/m/Y')); ?>" autocomplete="off" 1>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 grid-margin strech-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Contato</h4>
                            <p class="card-description no-print">
                                Preencha os campos com os dados do contato
                            </p>


                            <div class="form-group">
                                <label for="tipo">Título*</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Digite o título!" value="<?php echo e($ocorrencia->titulo); ?>" required>
                            </div>


                            <div class="form-group">
                                <label for="situacao">Perfil:</label>
                                <select name="situacao" id="situacao" class="form-control" onchange="mostrar()"
                                        required>

                                    <option disabled>Selecionado:</option>
                                    <?php if($ocorrencia->situacao == 1): ?>
                                        <option value="1">Resolvido</option>
                                    <?php elseif($ocorrencia->situacao == 2): ?>
                                        <option value="2">Não Resolvido</option>
                                    <?php elseif($ocorrencia->situacao == 3): ?>
                                        <option value="3">Agendado</option>
                                    <?php else: ?>
                                        <option value="0">Sócio</option>
                                    <?php endif; ?>

                                    <option disabled></option>
                                    <option disabled>Outras opções</option>

                                    <option value="1">Resolvido</option>
                                    <option value="2">Não Resolvido</option>
                                    <option value="3">Agendado</option>
                                </select>
                            </div>


                            <?php
                                $resultDate;
                                try {
                                    $date = new Date($ocorrencia->data_hora);
                                    $resultDate = $date->format('d/m/Y H:m:s');
                                } catch (\Exception $e) {
                                    $resultDate = $ocorrencia->data_hora;
                                }
                            ?>

                            <div class="form-group">
                                <label for="data_hora">Data/Hora*</label>
                                <input type="text" class="form-control" id="dpn" name="dataContato"
                                       placeholder="" value="<?php echo e($resultDate); ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-print">
                <div class="col-sm-12 grid-margin strech-car">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-block btn-outline-success" type="submit" id="atualizar">Atualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <div class="row no-print">
            <div class="container">
            <span class="float-right" style="margin-right:10px;margin-bottom: 5px;">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mensagens">
                        Adicionar mensagens
                    </button>
            </span>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="mensagens" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form action="<?php echo e(route('mensagem.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="ocorrencia_id" value="<?php echo e($ocorrencia->id); ?>">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modelTitleId">Adicionar mensagem</h5>
                        </div>

                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mensagem">Mensagem*</label>
                                    <textarea class="form-control" id="mensagem" name="mensagem"
                                              placeholder="Digite a mensagem!" required></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="observacao">Observação*</label>
                                    <textarea class="form-control" id="observacao" name="observacao"
                                              placeholder="Digite uma observação!" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">


                <div class="card card-small mb-4">
                    <div class="card-header border-bottom text-center">
                        <h6 class="m-0">Mensagens <b class="text-success"></b></h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">

                        <table class="table mb-0">

                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">Mensagens</th>
                                <th scope="col" class="border-0">Observação</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $mensagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($mensagem->mensagem); ?></td>
                                    <td><?php echo e($mensagem->observacao); ?></td>
                                    <td class="no-print">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                Administrar
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item"
                                                   href="<?php echo e(route('mensagem.show', ['id' => $mensagem->id])); ?>"><i
                                                            class="ti-eye"></i> Ver</a>

                                                <div class="dropdown-divider"></div>

                                                <form action="<?php echo e(route('mensagem.destroy', ['id' => $mensagem->id])); ?>"
                                                      method="post">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn btn-link text-danger" type="submit">
                                                        <i class="ti-trash"></i>Apagar
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($mensagens->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/datepicker/foundation-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/notificacoes.js')); ?>"></script>
    <script>

        $('#data_ocorrencia').datepicker({
            language: 'pt-BR'
        });

        mostrar();
    </script>
    <script src="<?php echo e(asset('js/admin/ocorrencia.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>