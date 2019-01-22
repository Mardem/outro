@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSocios', 'active')
@section('content')
    <form action="{{ route('socios.store') }}" method="post" id="form-send">
        @csrf

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('socios.index') }}">Controle</a>
                                <span class="breadcrumb-item active">Cadastrar novo sócio</span>
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
                            <label for="name">Título*:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                   placeholder=" Digite o título do usuário" value="{{ old('titulo') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tipo">Categoria*:</label>
                            <select name="tipo" class="form-control" id="tipo">
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
                                   placeholder=" Digite o nome do usuário" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder=" Digite o RG"
                                   value="{{ old('rg') }}">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cnpj" placeholder=" Digite o CPF"
                                   value="{{ old('cpf') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="socio@dominio.com" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="operador">Operador*:</label>
                            <select id="operador" name="user_id" class="form-control">

                                @foreach($operadores as $operador)
                                    <option value="{{ $operador->id }}">{{ $operador->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="telefones">Telefones:</label>
                            <br>
                            <input type="text" id="telefones" name="telefone" data-role="tagsinput"> <br>
                            <small>Pressione <code>Tab ↹</code> para adicionar um novo número de telefone.</small>
                        </div>

                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" onkeyup="moeda(this);" id="valor" name="valor"
                                   placeholder=" Digite o valor">
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

                        <!--<div class="form-group">
                            <label for="type">Tipo*:</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="0"></option>
                                <option value="0"></option>
                                <option value="0"></option>
                                <option value="0"></option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control pula" id="cep" maxlength="12" name="cep"
                                   placeholder="Informe o CEP">
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                                   placeholder=" Endereço">
                        </div>

                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="number" min="0" class="form-control" id="numero" name="numero"
                                   placeholder=" Número">
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   placeholder=" Complemento">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/tagsinput/tagInput.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/socios.js') }}"></script>
    <script src="{{ asset('admin/vendors/tagsinput/tagInput.js') }}"></script>
    <script>
        function moeda(z){
            v = z.value;
            v=v.replace(/\D/g,"") // permite digitar apenas numero
            v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
            v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
            v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
            v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
            v=v.replace(/(\d{1})(\d{1,2})$/,"$1.$2") // coloca virgula antes dos ultimos 2 digitos
            z.value = v;
        }
    </script>
@endsection