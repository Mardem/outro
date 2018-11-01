@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSocios', 'active')
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
                            <p class="mb-0 text-right">Total de sócios</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $socios->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos sócios cadastrados
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
                        <a href="{{ route('socios.create') }}" class="btn btn-outline-primary">Novo sócio</a>
                    </span>
                    <h4 class="card-title">Sócios</h4>
                    <p class="card-description">
                        Veja, edite e apague os sócios do sistema.
                    </p>

                    @component('layouts.components.pesquisa')
                        <input type="hidden" name="tipo" value="1">
                    @endcomponent

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Situação</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($socios as $socio)
                                    <tr>
                                        <td>{{ $socio->id }}</td>
                                        <td>{{ $socio->nome }}</td>
                                        <td>
                                            @if($socio->situacao == 0)
                                                <b class="text-success">Ativo</b>
                                                @else
                                                <b class="text-danger">Inativo</b>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href="{{ route('socios.show', ['id' => $socio->id]) }}"><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('socios.destroy', ['id' => $socio->id]) }}" method="post">
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