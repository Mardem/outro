@extends('layouts.admin.main')

@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-search text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">
                                {{ $tipo }}
                                @if($pesquisa->count() > 1)
                                    encontrados
                                    @else
                                    encontrado
                                @endif
                            </p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $pesquisa->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>
                        <small style="text-transform: lowercase">
                            {{ $tipo }}
                            @if($pesquisa->count() > 1)
                                encontrados
                            @else
                                encontrado
                            @endif
                        </small>
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
                        <a onclick="window.history.back()" href="#" class="btn btn-primary">
                            <i class="ti-back-left"></i> Voltar
                        </a>
                    </span>
                    <h4 class="card-title">Pesquisa de {{ $tipo }}</h4>

                    @if($request->tipo == 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Login</th>
                                    <th>Perfil</th>
                                    <th>Situação</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pesquisa as $usuario)
                                    <tr>
                                        <td>
                                            {{ $usuario->name }}
                                        </td>
                                        <td>
                                            {{ $usuario->email }}
                                        </td>
                                        <td>
                                            @switch($usuario->category)
                                                @case(0)
                                                Sócio
                                                @break
                                                @case(1)
                                                Administrador
                                                @break
                                                @case(2)
                                                Operador
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if($usuario->situacao == 0)
                                                <b class="text-success">Ativo</b>
                                            @else
                                                <b class="text-waring">Inativo</b>
                                            @endif
                                        </td>
                                        <td class="text-danger">
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href="{{ route('usuario.show', ['id' => $usuario->id]) }}"><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form onclick="del({{ $usuario->id }})" id="{{ $usuario->id}}">
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
                        @elseif($request->tipo == 1)
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
                                @foreach($pesquisa as $socio)
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
                                                       href=""><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('socios.destroy', ['id' => $socio->id]) }}">
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
                    @elseif($request->tipo == 2)
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
                                @foreach($pesquisa as $ocorrencia)
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
                                                       href=""><i
                                                                class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('gerenciamento.destroy', ['id' => $ocorrencia->id]) }}">
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
                    @endif

                    {{ $pesquisa->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var options = {
            @if($request->tipo == 0)
            url: "{{ route('jsonUsers') }}",
            getValue: "nome",
                @else
                url: "{{ route('jsonSocios') }}",
                getValue: "nome",
            @endif

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $("#pesquisa").easyAutocomplete(options);

        // Envia a pesquisa
        $('#sendSearch').on("click", function() {
            $('#form-search').submit();
        });
    </script>
@endsection