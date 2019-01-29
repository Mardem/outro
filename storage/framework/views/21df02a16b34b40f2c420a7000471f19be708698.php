<?php $__env->startSection('subdescription'); ?>
    Para redefinir sua senha, preencha corretamente todos os dados pedidos abaixo.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('password.update')); ?>">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <div class="form-group row">

            <label for="email">Digite seu email</label>
            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                   name="email" value="<?php echo e($email ?? old('email')); ?>" required autofocus
                   placeholder=" Endereço de e-mail">

            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group row">
            <label for="password">Senha</label>
            <input id="password" type="password"
                   class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                   placeholder=" Nova senha" required>

            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="form-group row">
            <label for="password-confirm">Confirme a senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   placeholder=" Confirmação da senha" required>
        </div>

        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-block btn-primary" style="background: #8D130E">
                <?php echo e(__('Redefinir Senha')); ?>

            </button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.aberto.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>