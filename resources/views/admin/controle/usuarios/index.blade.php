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

                    <table id="tableDataTable" class="table table-striped table-bordered"></table>
                    <form action="" method="post" class="hidden" id="deleteData">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/dataTable/css/jquery.dataTables.css') }}">
@endsection

@section('scripts')
    @routes
    <script src="{{ asset('js/ziggy.js') }}"></script>
    <script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/admin/helper.js') }}"></script>
    <script>
        let ver = "<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm'>Ver</a>";

         @if(\Auth::user()->category == 1)
             let apagar = "<a href='javascript:void(0);' class='btn btn-outline-danger btn-sm'>Apagar</a>";
         @else
             let apagar = "";
         @endif

        let columns = [
            {data: 'id', title: 'Código'},
            {data: 'name', title: 'Nome'},
            {data: 'email', title: 'Login'},
            {
                data: 'category',
                title: 'Perfil',
                "render": function (data) {
                    let profile;

                    switch (data){
                        case(0):
                            profile = "Sócio";
                            break;
                        case(1):
                            profile = "Administrador";
                            break;
                        case(2):
                            profile = "Operador";
                            break;
                    }
                    return profile;
                }
            },
            {
                data: 'situacao',
                title: 'Situação',
                "render": function (data) {
                    if (data == 0) {
                        return "<b class='text-success'>Ativo</b>";
                    } else {
                        return "<b class='text-danger'>Inativo</b>";
                    }
                }
            },
            {
                data: null,
                title: 'Ações',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html(ver + apagar);
                }
            }
        ];
        jsonDataTables("{{ route('jsonUsers') }}", "{{ \Auth::user()->token }}", columns, 'usuario');
    </script>
@endsection