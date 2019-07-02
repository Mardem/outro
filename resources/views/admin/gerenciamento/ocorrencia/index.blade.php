@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeOcorrencia', 'active')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="ti-user text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Total de ocorrências</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ $ocorrencias->total() }}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas ocorrências cadastrados
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <span style="float: right;">
                    <a href="{{ route('ocorrencia.create') }}" class="btn btn-outline-primary">Nova ocorrência</a>
                </span>
                <h4 class="card-title">Ocorrências</h4>
                <p class="card-description">
                    Veja, edite e apague as ocorrências do sistema.
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sócio</th>
                            <th>Data da última ocorrência</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ocorrencias as $ocorrencia)
                        @if ($ocorrencia->tipo_socio == \App\Models\Gerenciamento::TIPO_SOCIO['SOCIO'])
                        <tr>
                            <td>{{ $ocorrencia->socio->nome }}</td>
                            <td>{{ $ocorrencia->data_ocorrencia_formated }}</td>
                            <td>
                                <a href="{{ route('ocorrencia.show', $ocorrencia->id) }}"
                                    class="btn btn-primary btn-sm">Ver</a>
                                <form action="{{ route('ocorrencia.destroy', $ocorrencia->id) }}" method="POST"
                                    style="display: initial">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Apagar</button>
                                </form>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>{{ $ocorrencia->socioCheque->emitente }}</td>
                            <td>{{ $ocorrencia->data_ocorrencia_formated }}</td>
                            <td>
                                <a href="{{ route('ocorrencia.show', $ocorrencia->id) }}"
                                    class="btn btn-primary btn-sm">Ver</a>
                                <form action="{{ route('ocorrencia.destroy', $ocorrencia->id) }}" method="POST"
                                    style="display: initial">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Apagar</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                {{ $ocorrencias->links() }}
            </div>
        </div>
    </div>
</div>

@endsection