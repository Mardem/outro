@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSociosCheque', 'active')
@section('content')

<div id="expose">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12 grid-margin-strech-card mb-1">
            <div class="card">
                <div class="card-body">
                    <div class="cad-title">
                        <nav class="breadcrumb" style="margin: 0">
                            <a class="breadcrumb-item" href="{{ route('sociosCheque.index') }}">Controle</a>
                            <span class="breadcrumb-item active">Visualizando sócio cheque<b>
                                    {{ $socio->emitente }}</b></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row">
            <div class="col-sm-6 text-center">
                <form action="{{ route('direct.occurrency.index') }}" method="get">
    <input type="hidden" name="socio_id" value="{{ $socio->id }}">
    <input type="hidden" name="operador_id" value="{{ $socio->operador->id }}">
    <input type="hidden" name="partner_name" value="{{ $socio->nome }}">
    <button class="btn btn-outline-primary mb-3 mt-3">Nova ocorrência</button>
    </form>
</div>
@can('admin')
<div class="col-sm-6 text-center">
    <a href="{{ route('imagens.create', ['partner_id' => $socio->id]) }}" class="btn btn-outline-primary mb-3 mt-3"
        id="novaOcorrencia">Adicionar imagem</a>
</div>
@endcan
</div> --}}

<form action="{{ route('sociosCheque.update', ['id' => $socio->id]) }}" method="post" id="form-send">
    @csrf
    @method('PUT')

    <input type="hidden" name="antigo" value="{{ $socio->user_id }}">

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
                            <option value="0" {{ $socio->origem == 0 ? 'selected' : '' }}>Itiquira</option>
                            <option value="1" {{ $socio->origem == 1 ? 'selected' : '' }}>Solução</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="emitente">Nome do Emitente*:</label>
                        <input type="text" class="form-control" id="emitente" name="emitente"
                            placeholder=" Digite o nome do usuário" value="{{ $socio->emitente }}" >
                    </div>

                    <div class="form-group">
                        <label for="cpf_cnpj">CPF/CNPJ*:</label>
                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj"
                            placeholder=" Digite o CPF ou CNPJ" value="{{ $socio->cpf_cnpj }}"
                            >
                    </div>

                    <div class="form-group">
                        <label for="banco">Banco*:</label>
                        <select id="banco" name="banco" class="form-control">

                            @foreach($bancos as $value => $key)
                            <option value="{{ $key }}" {{ $socio->banco == $key ? 'selected' : '' }}>{{ $value }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="numero_cheque">Número do cheque:</label>
                        <input type="text" class="form-control" id="numero_cheque" name="numero_cheque"
                            placeholder=" Digite o valor" value="{{ $socio->numero_cheque }}">
                    </div>

                    <div class="form-group">
                        <label for="quantidade_cheque">Quantidade:</label>
                        <input type="text" class="form-control" id="quantidade_cheque" name="quantidade_cheque"
                            placeholder=" Digite o valor" value="{{ $socio->quantidade_cheque }}">
                    </div>

                    <div class="form-group">
                        <label for="valor_unitario">Valor unitário:</label>
                        <input type="text" class="form-control" onkeyup="moeda(this);" id="valor_unitario"
                            name="valor_unitario" placeholder=" Digite o valor" value="{{ $socio->valor_unitario }}">
                    </div>

                    <div class="form-group">
                        <label for="valor_total">Valor total:</label>
                        <input type="text" class="form-control" onkeyup="moeda(this);" id="valor_total"
                            name="valor_total" placeholder=" Digite o valor" value="{{ $socio->valor_total }}">
                    </div>

                    <div class="form-group">
                        <label for="vencimento">Vencimento:</label>
                        <input type="text" id="vencimento" name="vencimento" class="form-control"
                            placeholder="12/03/1977" value="{{ $socio->vencimento_formated }}">
                    </div>

                    <div class="form-group">
                        <label for="titulo">Título*:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            placeholder=" Digite o título do usuário" value="{{ $socio->titulo }}">
                    </div>

                    <div class="form-group">
                        <label for="titular">Nome do titular*:</label>
                        <input type="text" class="form-control" id="titular" name="titular"
                            placeholder=" Digite o nome do titular" value="{{ $socio->titular }}" >
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="socio@dominio.com"
                            value="{{ $socio->email }}">
                    </div>

                    <div class="form-group">
                        <label for="user_id">Operador*:</label>
                        <select id="operador" name="user_id" class="form-control">

                            @foreach($operadores as $operador)
                            <option value="{{ $operador->id }}"
                                {{ $operador->id == $socio->user_id ? 'selected' : '' }}>{{ $operador->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    {{-- @if(\Auth::user()->category == 1)
                                <div class="form-group">
                                    <label for="operador">Operador*:</label>
                                    <select id="operador" name="user_id" class="form-control">

                                        @php
                                            try {
                                                $opName = $socio->operador->name;
                                                $opId = $socio->operador->id;
                                            } catch (\Exception $e) {
                                                $opName = "Operador não existe!";
                                            }
                                        @endphp


                                        <optgroup label="Operador selecionado">
                                            <option value="{{ $opId }}">{{ $opName }}</option>
                    </optgroup>

                    <optgroup label="Outros operadores">
                        @foreach($operadores as $operador)
                        <option value="{{ $operador->id }}">{{ $operador->name }}</option>
                        @endforeach
                    </optgroup>

                    </select>
                </div>
                @else
                @endif --}}

                <div class="form-group">
                    <label for="telefones">Telefones:</label>
                    <br>
                    <input type="text" id="telefones" name="telefone" data-role="telefones"
                        value="{{ $socio->telefone }}"> <br>
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
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control pula" id="cep" maxlength="12" name="cep"
                        placeholder="Informe o CEP" value="{{ $socio->cep }}">
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder=" Endereço" value="{{ $socio->endereco }}">
                </div>

                <div class="form-group">
                    <label for="uf">UF:</label>
                    <input type="text" class="form-control" id="uf" name="uf" placeholder=" uf" value="{{ $socio->uf }}">
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder=" Bairro" value="{{ $socio->bairro }}">
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" Cidade" value="{{ $socio->cidade }}">
                </div>
            </div>
            @can('admin')
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar
                        dados
                    </button>
                </div>
            </div>
            @endcan
        </div>
    </div>
    </div>
</form>
{{-- <div class="row">

    <div class="col-sm-6 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                @can('admin')
                <div class="form-group">
                    <form action="{{ route('direct.partner-change-status', $socio->id) }}" method="post">
                        @csrf
                        <label for="situacao">Situação</label>
                        <select name="situacao" id="situacao" class="form-control">
                            <optgroup label="Situação atual">
                                <option value="{{ $socio->situacao }}">{!! $socio->situacao_formated !!}</option>
                            </optgroup>
                            <optgroup label="Outras situações">
                                <option value="0">Ativo</option>
                                <option value="1">Inativo</option>
                            </optgroup>
                        </select>
                        <button class="btn btn-outline-success mt-2">Mudar</button>
                    </form>
                </div>
                @endcan

                <div class="form-group text-center">
                    <label for="">Situação atual</label>
                    <h5>{!! $socio->situacao_formated !!}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 grid-margin strech-card">
        <div class="card">
            <div class="card-body" id="observation">

                @can('operador')
                <label for="observacao" style="font-weight: bold">Observação</label>
                <div class="card">
                    <div class="card-body">
                        <p>
                            {{ $socio->observacao }}
                        </p>
                    </div>
                </div>
                @endcan

                @can('admin')
                <form action="{{ route('saveObservation', [$socio->getKey()]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="observacao" style="font-weight: bold">Observação</label>
                    <textarea name="observacao" placeholder=" Digite sua observação" id="observacao" rows="4"
                        class="form-control">{{ $socio->observacao }}</textarea>
                    <button class="btn btn-success mt-1">Salvar</button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div> --}}





{{-- <div class="row">
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
</div> --}}

{{-- <div class="row">
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
                                @foreach($ocorrencias as $ocorrencia)
                                    <tr>
                                        <td>{{ $ocorrencia->data_ocorrencia_formated }}</td>
<td>{{ $ocorrencia->titulo ?? '...' }}</td>
<td>
    <a href="{{ route('ocorrencia.show', ['id' => $ocorrencia->id]) }}" class="btn btn-outline-primary">Ver</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

{{ $ocorrencias->links() }}
</div>
</div>
</div>
</div> --}}
</div>

@endsection

@if(\Auth::user()->category == 2)
@section('scripts')
<script src="//oss.maxcdn.com/jquery.trip.js/3.3.3/trip.min.js"></script>
<script src="{{ asset('js/admin/trip.js') }}"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="//oss.maxcdn.com/jquery.trip.js/3.3.3/trip.min.css" />
@endsection
@endif

@section('scripts')
<script src="{{ asset('js/admin/socios.js') }}"></script>
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
@endsection