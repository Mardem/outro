<?php $__env->startSection('subdescription'); ?>
    Insira seu endereço de e-mail para a redefinição de senha, nós vamos mandar um email para você mudar sua senha.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageLinks'); ?>
    <a href="<?php echo e(route('login')); ?>">Voltar para o login</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group row">

            <div class="col-md-12">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder=" Digite o email" required>

                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" style="background: #8D130E">
                <?php echo e(__('Enviar link de redefinição de senha')); ?>

            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.aberto.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>