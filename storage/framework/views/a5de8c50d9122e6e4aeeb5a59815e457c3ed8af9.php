<?php $__env->startSection('showContact', 'show'); ?>
<?php $__env->startSection('activeSMS', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-message text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Mensagens enviadas</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0"><?php echo e($count->count()); ?></h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas mensagens enviadas
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
                        <a href="<?php echo e(route('sms.create')); ?>" class="btn btn-outline-primary">Nova mensagem</a>
                    </span>
                    <h4 class="card-title">Mensagens</h4>
                    <p class="card-description">
                        Veja todas as mensagens que foram enviadas.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mensagem</th>
                                <th>Telefone</th>
                                <th>Tipo de envio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($message->message); ?></td>
                                    <td><?php echo e($message->phone); ?></td>
                                    <td>
                                        <?php if($message->type == 0): ?>
                                            <b class="text-primary">Mensgem direta</b>
                                            <?php else: ?>
                                            <b class="text-success">Mensagem múltipla</b>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <?php echo e($messages->links()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>