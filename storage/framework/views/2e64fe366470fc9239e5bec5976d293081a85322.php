<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeSocios', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="ti-user text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total de sócios</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0"><?php echo e($total); ?></h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos sócios cadastrados
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <span style="float: right;">
                        <a href="<?php echo e(route('socios.create')); ?>" class="btn btn-outline-primary">Novo sócio</a>
                    </span>
                    <?php endif; ?>
                    <h4 class="card-title">Sócios</h4>
                    <p class="card-description">
                        Veja, edite e apague os sócios do sistema.
                    </p>
                    <form action="<?php echo e(route('searchPartner')); ?>" method="get" class="form-inline mt-2 mb-4">
                        <input type="text" name="socio" class="form-control w-25 mr-1" placeholder=" Digite a sua busca" required>
                        <button class="btn btn-primary">Pesquisar</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Título</th>
                                <th>Operador</th>
                                <th>Data de designação</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $socios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($socio->nome); ?></td>
                                    <td><?php echo e($socio->cpf_cnpj); ?></td>
                                    <td><?php echo e($socio->titulo); ?></td>
                                    <td><?php echo e($socio->operador->name); ?></td>
                                    <td><?php echo $socio->data_designacao_formated; ?></td>
                                    <td>
                                        <?php echo $socio->situacao_formated; ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('socios.show', [$socio->getKey()])); ?>"
                                           class="btn btn-primary btn-sm btn-block mb-1">Ver</a>
                                        <?php if(\Auth::user()->category == 1): ?>
                                            <form action="<?php echo e(route('socios.destroy', $socio->getKey())); ?>"
                                                  method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm btn-block">Apagar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p style="text-align: center">
                                    Nenhum dado registrado.
                                </p>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                        <?php echo e($socios->links()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>