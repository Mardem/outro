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
                                <h3 class="font-weight-medium text-right mb-0">{{ $ocorrencias->count() }}</h3>
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

                    @component('layouts.components.pesquisa')
                        <input type="hidden" name="tipo" value="2">
                    @endcomponent

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Sócio</th>
                                <th>Data da Última Ocorrência</th>
                                <th>Título</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ocorrencias as $ocorrencia)
                                    @php
                                        try {
                                            $socio = \App\Models\Socio::where('id', $ocorrencia->socio_id)->first();
                                        } catch (\Exception $e) {
                                    }
                                    @endphp
                                    <tr>
                                        <td>{{ $socio->nome }}</td>
                                        <td>{{ $ocorrencia->data_ocorrencia }}</td>
                                        <td>{{ $ocorrencia->titulo }}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href="{{ route('ocorrencia.show', ['id' => $ocorrencia->id]) }}"><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('ocorrencia.destroy', ['id' => $ocorrencia->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-link text-danger" type="submit">
                                                            <i class="ti-trash"></i>Apagar
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
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
    <script>
        var options = {
            url: "{{ route('jsonSocios') }}",
            getValue: "nome",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $("#pesquisa").easyAutocomplete(options);

        // Envia a pesquisa
        $('#sendSearch').on("click", function () {
            $('#form-search').submit();
        });
    </script>
@endsection