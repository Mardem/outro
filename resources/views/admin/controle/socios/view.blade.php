@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSocios', 'active')
@section('content')
    <form action="{{ route('socios.update', ['id' => $socio->id]) }}" method="post" id="form-send">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('socios.index') }}">Controle</a>
                                <span class="breadcrumb-item active">Visualizando sócio <b>{{ $socio->nome }}</b></span>
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
                                   placeholder=" Digite o título do sócio" value="{{ $socio->titulo }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Nome*:</label>
                            <input type="text" class="form-control" id="name" name="nome"
                                   placeholder=" Digite o nome do sócio" value="{{ $socio->nome }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rg">RG*:</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder=" Digite o RG"
                                   value="{{ $socio->rg }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF*:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cnpj" placeholder=" Digite o CPF"
                                   value="{{ $socio->cpf_cnpj }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="socio@dominio.com" value="{{ $socio->email }}">
                        </div>

                        <div class="form-group">
                            <label for="operador">Operador*:</label>
                            <select id="operador" name="operador_id" class="form-control">

                                @php
                                        $op = \App\User::find($socio->operador_id);
                                @endphp
                                <option disabled>Selecionado:</option>
                                <option value="{{ $socio->operador_id }}">@php
                                        try {
                                            echo $op->name;
                                        } catch (\Exception $e) {
                                            echo "Operador não existe!";
                                        }
                                    @endphp
                                </option>

                                <option disabled></option>
                                <option disabled>Outros operadores:</option>
                                @foreach($operadores as $operador)
                                    <option value="{{ $operador->id }}">{{ $operador->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="telefones">Telefones:</label>
                            <br>
                            <input type="text" id="telefones" name="telefone" data-role="telefones" value="{{ $socio->telefone }}"> <br>
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
                                   placeholder="Informe o CEP" value="{{ $socio->cep }}">
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco"
                                   placeholder=" Endereço" value="{{ $socio->endereco }}">
                        </div>

                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="number" min="0" class="form-control" id="numero" name="numero"
                                   placeholder=" Número" value="{{ $socio->numero }}">
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro" value="{{ $socio->bairro }}">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade" value="{{ $socio->cidade }}">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   placeholder=" Complemento" value="{{ $socio->complemento }}">
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


@endsection

@section('scripts')
    <script src="{{ asset('js/admin/socios.js') }}"></script>
@endsection