<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeGerenciamento', 'active'); ?>
<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('usuario.store')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="<?php echo e(route('usuario.index')); ?>">Controle</a>
                                <span class="breadcrumb-item active">Cadastrar novo usuário</span>
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
                        <h4 class="card-title">Dados pessoais</h4>
                        <p class="card-description">
                            Preencha os campos com dados pessoais do usuário
                        </p>


                        <div class="form-group">
                            <label for="name">Nome*:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=" Digite o nome do usuário" value="<?php echo e(old('name')); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder=" Digite o CPF" value="<?php echo e(old('cpf')); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="perfil">Perfil*:</label>
                            <select name="category" id="perfil" class="form-control" required>
                                <option value="2">Operador</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Acesso ao sistema</h4>
                        <p class="card-description">
                            Preencha os campos com dados pessoais do usuário
                        </p>


                        <div class="form-group">
                            <label for="email">E-Mail*:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=" Digite o email de acesso ao sistema" value="<?php echo e(old('email')); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Senha*:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder=" Senha de acesso" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar senha*:</label>
                            <input type="password" class="form-control" placeholder=" Digite a senha novamente" required>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>