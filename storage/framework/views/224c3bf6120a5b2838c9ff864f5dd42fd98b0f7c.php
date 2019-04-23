<?php $__env->startSection('pageLinks'); ?>
    <a href="<?php echo e(route('login')); ?>" class="active">Login</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>

        <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
        <input type="text" placeholder="Endereço de e-mail"
               class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
               value="<?php echo e(old('email')); ?>" required autofocus>


        <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
        
        <input id="password" type="password"
               class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Digite a senha" required>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

            <label class="form-check-label" for="remember">
                <?php echo e(__('Mantenha-me conectado')); ?>

            </label>
        </div>
        <div class="form-button">
            <button id="submit" type="submit" class="ibtn">Login</button>
            <a href="<?php echo e(route('password.request')); ?>">Esqueci minha senha</a>
        </div>
    </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.aberto.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>