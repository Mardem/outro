<?php $__env->startSection('showControle', 'show'); ?>
<?php $__env->startSection('activeSocios', 'active'); ?>
<?php $__env->startSection('content'); ?>

    <div id="expose">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('socios.update', ['id' => $socio->id])); ?>" method="post" id="form-send">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input type="hidden" name="antigo" value="<?php echo e($socio->user_id); ?>">

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
                <div class="col-sm-12" align="center">
                    <a href="<?php echo e(route('ocorrencia.create', ['id' => $socio->id, 'name' => $socio->nome])); ?>"
                       class="btn btn-outline-primary mb-3 mt-3" id="novaOcorrencia">Nova ocorrência</a>
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
                                <label for="tipo">Categoria*:</label>
                                <select name="tipo" class="form-control" id="tipo">
                                    <option value="<?php echo e($socio->tipo); ?>"><?php echo e($socio->tipo); ?></option>

                                    <option disabled></option>
                                    <option disabled>Outras Categorias:</option>
                                    <option value="Contribuintes">Contribuintes</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Plus">Plus</option>
                                    <option value="Remido Cancelado">Remido Cancelado</option>
                                    <option value="Remido Clube">Remido Clube</option>
                                    <option value="Remidos Thermas">Remidos Thermas</option>
                                    <option value="Remidos Itiquira">Remidos Itiquira</option>
                                    <option value="Titulos Sênior">Titulos Sênior</option>
                                    <option value="Vip">Vip</option>
                                    <option value="Vivendas">Vivendas</option>
                                    <option value="Vivendas Clube">Vivendas Clube</option>
                                    <option value="Boletos">Boletos</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Nota Promissória">Nota Promissória</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Nome*:</label>
                                <input type="text" class="form-control" id="name" name="nome"
                                       placeholder=" Digite o nome do sócio" value="<?php echo e($socio->nome); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="rg">RG:</label>
                                <input type="text" class="form-control" id="rg" name="rg" placeholder=" Digite o RG"
                                       value="<?php echo e($socio->rg); ?>">
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

                            <?php if(\Auth::user()->category == 1): ?>
                                <div class="form-group">
                                    <label for="operador">Operador*:</label>
                                    <select id="operador" name="user_id" class="form-control">

                                        <?php
                                            try {
                                                $opName = $socio->operador->name;
                                                $opId = $socio->operador->id;
                                            } catch (\Exception $e) {
                                                $opName = "Operador não existe!";
                                            }
                                        ?>


                                        <optgroup label="Operador selecionado">
                                            <option value="<?php echo e($opId); ?>"><?php echo e($opName); ?></option>
                                        </optgroup>

                                        <optgroup label="Outros operadores">
                                            <?php $__currentLoopData = $operadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($operador->id); ?>"><?php echo e($operador->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>

                                    </select>
                                </div>
                            <?php else: ?>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="telefones">Telefones:</label>
                                <br>
                                <input type="text" id="telefones" name="telefone" data-role="telefones"
                                       value="<?php echo e($socio->telefone); ?>"> <br>
                                <small>Pressione <code>Tab ↹</code> para adicionar um novo número de telefone.</small>
                            </div>

                            <div class="form-group">
                                <label for="valor">Valor:</label>
                                <input type="text" class="form-control" onkeyup="moeda(this);" id="valor" name="valor"
                                       placeholder=" Digite o valor"
                                       value="<?php echo e($socio->valor); ?>">
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
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro"
                                       value="<?php echo e($socio->bairro); ?>">
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade"
                                       value="<?php echo e($socio->cidade); ?>">
                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" id="complemento" name="complemento"
                                       placeholder=" Complemento" value="<?php echo e($socio->complemento); ?>">
                            </div>

                            <div class="form-group" align="center">
                                <label for="">Data de Designação para o operador ocorreu em:</label>
                                <h5><?php echo e($socio->data_designacao_formated); ?></h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <div class="row">
                    <div class="col-sm-12 grid-margin strech-card">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar
                                    dados
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </form>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body" id="observation">
                        <form action="<?php echo e(route('saveObservation', [$socio->getKey()])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <label for="observacao" style="font-weight: bold">Observação</label>
                            <textarea name="observacao" placeholder=" Digite sua observação" id="observacao" rows="4" class="form-control"><?php echo e($socio->observacao); ?></textarea>
                            <button class="btn btn-success mt-1">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Outros dados</h4>

                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="data_nascimento">Data Nascimento:</label>
                                <input type="text" class="form-control pula" id="data_nascimento"
                                       value="<?php echo e($socio->data_nascimento); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="type">Tipo*:</label>
                                <input type="text" class="form-control" id="type" value="<?php echo e($socio->type); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="fone1">Fone 1:</label>
                                <input type="text" class="form-control pula" id="fone1" value="<?php echo e($socio->fone1); ?>"
                                       disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone2">Fone 2:</label>
                                <input type="text" class="form-control pula" id="fone2" value="<?php echo e($socio->fone2); ?>"
                                       disabled>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="fone3">Fone 3:</label>
                                <input type="text" class="form-control pula" id="fone3" value="<?php echo e($socio->fone3); ?>"
                                       disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone4">Fone 4:</label>
                                <input type="text" class="form-control" id="fone4" value="<?php echo e($socio->fone4); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone5">Fone 5:</label>
                                <input type="text" class="form-control" id="fone5" value="<?php echo e($socio->fone5); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone6">Fone 6:</label>
                                <input type="text" class="form-control" id="fone6" value="<?php echo e($socio->fone6); ?>" disabled>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="fone7">Fone 7:</label>
                                <input type="text" class="form-control" id="fone7" value="<?php echo e($socio->fone7); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="fone8">Fone 8:</label>
                                <input type="text" class="form-control" id="fone8" value="<?php echo e($socio->fone8); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone9">Fone 9:</label>
                                <input type="text" class="form-control" id="fone9" value="<?php echo e($socio->fone9); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone10">Fone 10:</label>
                                <input type="text" class="form-control" id="fone10" value="<?php echo e($socio->fone10); ?>" disabled>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="fone11">Fone 11:</label>
                                <input type="text" class="form-control" id="fone11" value="<?php echo e($socio->fone11); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="fone12">Fone 12:</label>
                                <input type="text" class="form-control" id="fone12" value="<?php echo e($socio->fone12); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone13">Fone 13:</label>
                                <input type="text" class="form-control" id="fone13" value="<?php echo e($socio->fone13); ?>" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fone14">Fone 14:</label>
                                <input type="text" class="form-control" id="fone14" value="<?php echo e($socio->fone14); ?>" disabled>
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Data da última ocorrência</th>
                                    <th>Título</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $ocorrencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ocorrencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $date = new Date($ocorrencia->data_ocorrencia);
                                    ?>
                                    <tr>
                                        <td><?php echo e($date->format('d/m/Y')); ?></td>
                                        <td><?php echo e($ocorrencia->titulo); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('ocorrencia.show', ['id' => $ocorrencia->id])); ?>"
                                               class="btn btn-outline-primary">Ver</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php echo e($ocorrencias->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="//oss.maxcdn.com/jquery.trip.js/3.3.3/trip.min.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('js/admin/socios.js')); ?>"></script>
        <script src="//oss.maxcdn.com/jquery.trip.js/3.3.3/trip.min.js"></script>
    <script>
        function moeda(z) {
            v = z.value;
            v = v.replace(/\D/g, "") // permite digitar apenas numero
            v = v.replace(/(\d{1})(\d{14})$/, "$1.$2") // coloca ponto antes dos ultimos digitos
            v = v.replace(/(\d{1})(\d{11})$/, "$1.$2") // coloca ponto antes dos ultimos 11 digitos
            v = v.replace(/(\d{1})(\d{8})$/, "$1.$2") // coloca ponto antes dos ultimos 8 digitos
            v = v.replace(/(\d{1})(\d{5})$/, "$1.$2") // coloca ponto antes dos ultimos 5 digitos
            v = v.replace(/(\d{1})(\d{1,2})$/, "$1.$2") // coloca virgula antes dos ultimos 2 digitos
            z.value = v;
        }
    </script>

    <?php if(\Auth::user()->category == 2): ?>
        <script src="<?php echo e(asset('js/admin/trip.js')); ?>"></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>