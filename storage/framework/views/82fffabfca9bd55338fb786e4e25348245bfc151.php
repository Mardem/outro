<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeSocios', 'active'); ?>
<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('socios.update', ['id' => $socio->id])); ?>" method="post" id="form-send">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="<?php echo e(route('socios.index')); ?>">Controle</a>
                                <span class="breadcrumb-item active">Visualizando sócio <b><?php echo e($socio->nome); ?></b></span>
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
                            Preencha os campos com dados pessoais do sócio
                        </p>

                        <div class="form-group">
                            <label for="titulo">Título*:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                   placeholder=" Digite o título do sócio" value="<?php echo e($socio->titulo); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Nome*:</label>
                            <input type="text" class="form-control" id="name" name="nome"
                                   placeholder=" Digite o nome do sócio" value="<?php echo e($socio->nome); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="rg">RG*:</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder=" Digite o RG"
                                   value="<?php echo e($socio->rg); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cnpj" placeholder=" Digite o CPF"
                                   value="<?php echo e($socio->cpf_cnpj); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="socio@dominio.com" value="<?php echo e($socio->email); ?>">
                        </div>

                        <div class="form-group">
                            <label for="operador">Operador*:</label>
                            <select id="operador" name="operador_id" class="form-control">

                                <?php
                                    $op = \App\User::find($socio->operador_id);
                                ?>
                                <option disabled>Selecionado:</option>
                                <option value="<?php echo e($socio->operador_id); ?>"><?php echo e($op->name); ?></option>

                                <option disabled></option>
                                <option disabled>Outros operadores:</option>
                                <?php $__currentLoopData = $operadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($operador->id); ?>"><?php echo e($operador->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="telefones">Telefones:</label>
                            <br>
                            <input type="text" id="telefones" name="telefone" data-role="telefones" value="<?php echo e($socio->telefone); ?>"> <br>
                            <small>Pressione <code>Tab ↹</code> para adicionar um novo número de telefone.</small>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informações</h4>
                        <p class="card-description">
                            Preencha os campos com as informações do sócio
                        </p>

                        <span id='mensagem' class="text-info"></span>

                        <div class="form-group">
                            <label for="email">CEP:</label>
                            <input type="text" class="form-control pula" id="cep" maxlength="12" name="cep"
                                   placeholder="Informe o CEP" value="<?php echo e($socio->cep); ?>">
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                                   placeholder=" Endereço" value="<?php echo e($socio->endereco); ?>">
                        </div>

                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="number" min="0" class="form-control" id="numero" name="numero"
                                   placeholder=" Número" value="<?php echo e($socio->numero); ?>">
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro" value="<?php echo e($socio->bairro); ?>">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade" value="<?php echo e($socio->cidade); ?>">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   placeholder=" Complemento" value="<?php echo e($socio->complemento); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar dados</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/admin/socios.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>