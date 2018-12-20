@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSocios', 'active')
@section('content')

    @can('admin')
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
                                <h3 class="font-weight-medium text-right mb-0">{{ $todos->count() }}</h3>
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
    @endcan

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    @can('admin')
                    <span style="float: right;">
                        <a href="{{ route('socios.create') }}" class="btn btn-outline-primary">Novo sócio</a>
                    </span>
                    @endcan
                    <h4 class="card-title">Sócios</h4>
                    <p class="card-description">
                        Veja, edite e apague os sócios do sistema.
                    </p>

                    <table id="tableDataTable" class="table table-striped table-bordered"></table>
                    <form method="post" class="hidden" action="" id="deleteData">
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
    <script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/admin/helper.js') }}"></script>
    <script>
        let ver = "<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm'>Ver</a>";

        @if(\Auth::user()->category == 1)
                let apagar = "<a href='javascript:void(0);' class='btn btn-outline-danger btn-sm'>Apagar</a>";
            @else
                let apagar = "<a href='javascript:void(0);' class='btn btn-outline-danger btn-sm' style='display: none'></a>";
        @endif
        let columns = [
            {data: 'id', title: 'Código'},
            {data: 'cpf_cnpj', title: 'CPF'},
            {data: 'titulo', title: 'Título'},
            {data: 'operador.name', title: 'Operador'},
            {data: 'nome', title: 'Nome'},
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
                createdCell: function (td) {
                    $(td).html(ver + apagar);
                }
            }
        ];
        jsonDataTables("{{ route('jsonPartners') }}", "{{ \Auth::user()->token }}", columns, 'socios');
    </script>
@endsection