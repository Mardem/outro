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
                            <label for="tipo">Categoria*:</label>
                            <select name="tipo" class="form-control" id="tipo">
                                <option value="{{ $socio->tipo }}">{{ $socio->tipo }}</option>

                                <option disabled></option>
                                <option disabled>Outras Categorias:</option>
                                <option value="Contribuintes">Contribuintes</option>
                                <option value="Gold">Gold</option>
                                <option value="Plus">Plus</option>
                                <option value="Remidos Thermas">Remidos Thermas</option>
                                <option value="Remidos Itiquira">Remidos Itiquira</option>
                                <option value="Titulos Sênior">Titulos Sênior</option>
                                <option value="Vip">Vip</option>
                                <option value="Vivendas">Vivendas</option>
                                <option value="Boletos">Boletos</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Nota Promissória">Nota Promissória</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Nome*:</label>
                            <input type="text" class="form-control" id="name" name="nome"
                                   placeholder=" Digite o nome do sócio" value="{{ $socio->nome }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder=" Digite o RG"
                                   value="{{ $socio->rg }}">
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
                                        $op = \App\User::find($socio->user_id);
                                @endphp
                                <option disabled>Selecionado:</option>
                                <option value="{{ $socio->user_id }}">@php
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

                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" onkeyup="moeda(this);" id="valor" name="valor" placeholder=" Digite o valor"
                                   value="{{ $socio->valor }}">
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

        @can('admin')
        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar dados</button>
                    </div>
                </div>
            </div>
        </div>
        @endcan

    </form>
    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Outros dados</h4>

                    <div class="row clearfix">
                        <div class="col-md-3">
                            <label for="data_nascimento">Data Nascimento:</label>
                            <input type="text" class="form-control pula" id="data_nascimento"
                                   value="{{ $socio->data_nascimento }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="type">Tipo*:</label>
                            <input type="text" class="form-control" id="type" value="{{ $socio->type }}" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="fone1">Fone 1:</label>
                            <input type="text" class="form-control pula" id="fone1" value="{{ $socio->fone1 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone2">Fone 2:</label>
                            <input type="text" class="form-control pula" id="fone2" value="{{ $socio->fone2 }}" disabled>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3">
                            <label for="fone3">Fone 3:</label>
                            <input type="text" class="form-control pula" id="fone3" value="{{ $socio->fone3 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone4">Fone 4:</label>
                            <input type="text" class="form-control" id="fone4" value="{{ $socio->fone4 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone5">Fone 5:</label>
                            <input type="text" class="form-control" id="fone5" value="{{ $socio->fone5 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone6">Fone 6:</label>
                            <input type="text" class="form-control" id="fone6" value="{{ $socio->fone6 }}" disabled>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3">
                            <label for="fone7">Fone 7:</label>
                            <input type="text" class="form-control" id="fone7" value="{{ $socio->fone7 }}" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="fone8">Fone 8:</label>
                            <input type="text" class="form-control" id="fone8" value="{{ $socio->fone8 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone9">Fone 9:</label>
                            <input type="text" class="form-control" id="fone9" value="{{ $socio->fone9 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone10">Fone 10:</label>
                            <input type="text" class="form-control" id="fone10" value="{{ $socio->fone10 }}" disabled>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3">
                            <label for="fone11">Fone 11:</label>
                            <input type="text" class="form-control" id="fone11" value="{{ $socio->fone11 }}" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="fone12">Fone 12:</label>
                            <input type="text" class="form-control" id="fone12" value="{{ $socio->fone12 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone13">Fone 13:</label>
                            <input type="text" class="form-control" id="fone13" value="{{ $socio->fone13 }}" disabled>
                        </div>

                        <div class="col-md-3">
                            <label for="fone14">Fone 14:</label>
                            <input type="text" class="form-control" id="fone14" value="{{ $socio->fone14 }}" disabled>
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
                                @foreach($socio->gerenciamentos as $ocorrencia)
                                    @php
                                        $date = new Date($ocorrencia->data_ocorrencia);
                                    @endphp
                                    <tr>
                                        <td>{{ $date->format('d/m/Y') }}</td>
                                        <td>{{ $ocorrencia->titulo }}</td>
                                        <td>
                                            <a href="{{ route('ocorrencia.') }}">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/admin/socios.js') }}"></script>
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