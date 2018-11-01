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
                            <div class="form-group col-md-12">
                                <label for="tipo">Título*:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Digite o título!" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="situacao">Situação*:</label>
                            <select name="situacao" id="situacao" class="form-control" required>
                                <option disabled></option>
                                <option value="1">Resolvido</option>
                                <option value="2">Não Resolvido</option>
                                <option value="3">Agendado</option>
                            </select>
                        </div>

                        <div class="form-group" style="display: none" id="data_hora">
                            <div class="form-group col-md-6">
                                <label for="data_hora">Data Contato*</label>
                                <input type="text" class="form-control" id="data_hora" name="data_hora"
                                       placeholder="">
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
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $("#data_ocorrencia").datepicker({
                language: "pt-BR",
            });

            $('#situacao').on('change', function() {
                let situacao = $(this).find('option:selected').text().trim();
                if(situacao == 'Agendado') {
                    $('#data_hora').show();
                }
                else if(situacao != 'Agendado') {
                    $('#data_hora').hide();
                }
            });
        });
    </script>
@endsection