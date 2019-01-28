@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeOcorrencia', 'active')
@section('content')
    <form action="{{ route('mensagem.update', ['id' => $mensagem->id]) }}" method="post" id="form-send">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                                <a class="breadcrumb-item"
                                   href="{{ route('ocorrencia.show', ['id' => $ocorrencia->id]) }}">Ocorrência</a>
                                <span class="breadcrumb-item active">Atualizar mensagem</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mensagens</h4>
                        <p class="card-description">
                            Atualizar mensagens
                        </p>

                        <div class="form-group">

                            <label for="mensagem">Mensagem*</label>
                            <textarea class="form-control" id="mensagem" name="mensagem"
                                      placeholder="Digite a mensagem!" required>{{ $mensagem->mensagem }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Atualizar dados
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection