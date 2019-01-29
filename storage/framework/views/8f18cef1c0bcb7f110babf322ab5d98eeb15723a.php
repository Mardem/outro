<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-search text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">
                                <?php echo e($tipo); ?>

                                <?php if($pesquisa->count() > 1): ?>
                                    encontrados
                                    <?php else: ?>
                                    encontrado
                                <?php endif; ?>
                            </p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo e($pesquisa->count()); ?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>
                        <small style="text-transform: lowercase">
                            <?php echo e($tipo); ?>

                            <?php if($pesquisa->count() > 1): ?>
                                encontrados
                            <?php else: ?>
                                encontrado
                            <?php endif; ?>
                        </small>
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
                        <a onclick="window.history.back()" href="#" class="btn btn-primary">
                            <i class="ti-back-left"></i> Voltar
                        </a>
                    </span>
                    <h4 class="card-title">Pesquisa de <?php echo e($tipo); ?></h4>

                    <?php if($request->tipo == 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Login</th>
                                    <th>Perfil</th>
                                    <th>Situação</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $pesquisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($usuario->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($usuario->email); ?>

                                        </td>
                                        <td>
                                            <?php switch($usuario->category):
                                                case (0): ?>
                                                Sócio
                                                <?php break; ?>
                                                <?php case (1): ?>
                                                Administrador
                                                <?php break; ?>
                                                <?php case (2): ?>
                                                Operador
                                                <?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td>
                                            <?php if($usuario->situacao == 0): ?>
                                                <b class="text-success">Ativo</b>
                                            <?php else: ?>
                                                <b class="text-waring">Inativo</b>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-danger">
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href="<?php echo e(route('usuario.show', ['id' => $usuario->id])); ?>"><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form onclick="del(<?php echo e($usuario->id); ?>)" id="<?php echo e($usuario->id); ?>">
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
                        </div>
                        <?php elseif($request->tipo == 1): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Situação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $pesquisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($socio->id); ?></td>
                                        <td><?php echo e($socio->nome); ?></td>
                                        <td>
                                            <?php if($socio->situacao == 0): ?>
                                                <b class="text-success">Ativo</b>
                                            <?php else: ?>
                                                <b class="text-danger">Inativo</b>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href=""><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="<?php echo e(route('socios.destroy', ['id' => $socio->id])); ?>">
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
                        </div>
                    <?php elseif($request->tipo == 2): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Sócio</th>
                                    <th>Data da Última Ocorrência</th>
                                    <th>Título</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $pesquisa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocorrencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        try {
                                            $socio = \App\Models\Socio::where('id', $ocorrencia->socio_id)->first();
                                        } catch (\Exception $e) {
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo e($socio->nome); ?></td>
                                        <td><?php echo e($ocorrencia->data_ocorrencia); ?></td>
                                        <td><?php echo e($ocorrencia->titulo); ?></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href=""><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="<?php echo e(route('gerenciamento.destroy', ['id' => $ocorrencia->id])); ?>">
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
                        </div>
                    <?php endif; ?>

                    <?php echo e($pesquisa->links()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        var options = {
            <?php if($request->tipo == 0): ?>
            url: "<?php echo e(route('jsonUsers')); ?>",
            getValue: "nome",
                <?php else: ?>
                url: "<?php echo e(route('jsonSocios')); ?>",
                getValue: "nome",
            <?php endif; ?>

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $("#pesquisa").easyAutocomplete(options);

        // Envia a pesquisa
        $('#sendSearch').on("click", function() {
            $('#form-search').submit();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>