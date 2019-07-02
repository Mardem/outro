@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSociosCheque', 'active')
@section('content')
<form action="{{ route('sociosCheque.store') }}" method="post" id="form-send">
    @csrf

    <div class="row">
        <div class="col-sm-12 grid-margin-strech-card mb-1">
            <div class="card">
                <div class="card-body">
                    <div class="cad-title">
                        <nav class="breadcrumb" style="margin: 0">
                            <a class="breadcrumb-item" href="{{ route('sociosCheque.index') }}">Controle</a>
                            <span class="breadcrumb-item active">Cadastrar novo sócio cheque</span>
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
                        Preencha os campos com dados pessoais do sócio cheque
                    </p>

                    <div class="form-group">
                        <label for="origem">Origem*:</label>
                        <select name="origem" class="form-control" id="origem">
                            <option value="0">Itiquira</option>
                            <option value="1">Solução</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="emitente">Nome do Emitente*:</label>
                        <input type="text" class="form-control" id="emitente" name="emitente"
                            placeholder=" Digite o nome do usuário" value="{{ old('emitente') }}" >
                    </div>

                    <div class="form-group">
                        <label for="cpf_cnpj">CPF/CNPJ*:</label>
                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj"
                            placeholder=" Digite o CPF ou CNPJ" value="{{ old('cpf_cnpj') }}"
                            >
                    </div>

                    <div class="form-group">
                        <label for="banco">Banco*:</label>
                        <select id="banco" name="banco" class="form-control">

                            @foreach($bancos as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numero_cheque">Número do cheque:</label>
                        <input type="text" class="form-control" id="numero_cheque" name="numero_cheque"
                            placeholder=" Digite o valor">
                    </div>

                    <div class="form-group">
                        <label for="quantidade_cheque">Quantidade:</label>
                        <input type="text" class="form-control" id="quantidade_cheque" name="quantidade_cheque"
                            placeholder=" Digite o valor">
                    </div>

                    <div class="form-group">
                        <label for="valor_unitario">Valor unitário:</label>
                        <input type="text" class="form-control" onkeyup="moeda(this);" id="valor_unitario"
                            name="valor_unitario" placeholder=" Digite o valor">
                    </div>

                    <div class="form-group">
                        <label for="valor_total">Valor total:</label>
                        <input type="text" class="form-control" onkeyup="moeda(this);" id="valor_total"
                            name="valor_total" placeholder=" Digite o valor">
                    </div>

                    <div class="form-group">
                        <label for="vencimento">Vencimento:</label>
                        <input type="text" id="vencimento" name="vencimento" class="form-control"
                            placeholder="12/03/1977" value="{{ old('vencimento') }}">
                    </div>

                    <div class="form-group">
                        <label for="titulo">Título*:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            placeholder=" Digite o título do usuário" value="{{ old('titulo') }}" >
                    </div>

                    <div class="form-group">
                        <label for="titular">Nome do titular*:</label>
                        <input type="text" class="form-control" id="titular" name="titular"
                            placeholder=" Digite o nome do titular" value="{{ old('titular') }}" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="socio@dominio.com"
                            value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="user_id">Operador*:</label>
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

                </div>
            </div>
        </div>

        <div class="col-sm-6 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informações</h4>
                    <p class="card-description">
                        Preencha os campos com as informações do sócio cheque
                    </p>

                    <span id='mensagem' class="text-info"></span>

                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control pula" id="cep" maxlength="12" name="cep"
                            placeholder="Informe o CEP">
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder=" Endereço">
                    </div>

                    <div class="form-group">
                        <label for="uf">UF:</label>
                        <input type="text" class="form-control" id="uf" name="uf" placeholder=" uf">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade">
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