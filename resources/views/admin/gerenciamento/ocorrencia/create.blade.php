@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeOcorrencia', 'active')
@section('content')
    <form action="{{ route('ocorrencia.store') }}" method="post" id="form-send">
        @csrf

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                                <span class="breadcrumb-item active">Cadastrar nova ocorrência</span>
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
                        <h4 class="card-title">Dados ocorrências</h4>
                        <p class="card-description">
                            Preencha os campos com dados da ocorrência
                        </p>

                        <div class="form-group">
                            <label for="socio">Sócio*:</label>
                            <select id="socio" name="socio_id" class="form-control">

                                @foreach($socios as $socio)
                                    <option value="{{ $socio->id }}">{{ $socio->nome }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data Ocorrência*</label>
                            <input type="text" class="form-control" name="data_ocorrencia" id="data_ocorrencia"
                                   placeholder="" required=""
                                   oninvalid="this.setCustomValidity('Campo obrigatório!')"
                                   data-toggle="datepicker"
                                   oninput="setCustomValidity('')" autocomplete="off">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contato</h4>
                        <p class="card-description">
                            Preencha os campos com os dados do contato
                        </p>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="tipo">Título*:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Digite o título!" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="situacao">Situação*:</label>
                            <select name="situacao" id="situacao" class="form-control" required>
                                <option value="1">Resolvido</option>
                                <option value="2">Não Resolvido</option>
                                <option value="3">Agendado</option>
                            </select>
                        </div>

                        <div class="form-group" id="data_hora" style="display: none;">

                            <label for="data_hora">Data do Contato*</label>
                            <input type="text" class="span2 form-control" id="dpn" name="dataContato" autocomplete="off">
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

@section('scripts')
    <script src="{{ asset('js/admin/datepicker/foundation-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/ocorrencia.min.js') }}"></script>
    <script>
        $('#data_ocorrencia').datepicker({
            language: 'pt-BR'
        });
    </script>
@endsection