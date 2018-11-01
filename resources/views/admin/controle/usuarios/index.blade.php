@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeUsuarios', 'active')
@section('content')

    <div class="row">
        <div class="col-sm-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-layout-grid2-thumb text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total de usuários</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $todos->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos usuários cadastrados
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-headphone text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total de operadores</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $operadores }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos operadores cadastrados
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-user text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Usuários ativos</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $ativos }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos usuários ativos no sistema
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="ti-user text-default icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Usuários inativos</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $inativos }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos usuários cadastrados
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
                        <a href="{{ route('usuario.create') }}" class="btn btn-outline-primary">Novo usuário</a>
                    </span>
                    <h4 class="card-title">Usuários</h4>
                    <p class="card-description">
                        Veja, edite e apague os usuários do sistema.
                    </p>

                    @component('layouts.components.pesquisa')
                        <input type="hidden" name="tipo" value="0">
                    @endcomponent

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

                            @foreach($usuarios as $usuario)
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
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var options = {
            url: "{{ route('jsonUsers') }}",
            getValue: "name",

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