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

                    <table id="tabelaSocios" class="table table-striped table-bordered"></table>
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
    <script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>

        $(document).ready(function () {
            let table = $('#tabelaSocios').DataTable({
                ajax: {
                    url: '{{ route('jsonSocios') }}',
                    dataSrc: ""
                },
                responsive: true,
                fixedHeader: true,
                stateSave: true,
                columns: [
                    {data: 'id', title: 'Código'},
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
                            $(td).html("<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm'>Ver</a> <a href='javascript:void(0);' class='btn btn-outline-danger btn-sm'>Apagar</a>");
                        }
                    }
                ],
                drawCallback: function () {
                    $('a').unbind('click');
                    $('#tabelaSocios>tbody>tr>td:last-child>a:first-child').click(function () {
                        let tr = $(this).closest('tr');
                        let row = table.row(tr).data();
                        window.location = route('socios.show', row.id).url();
                    });
                    $('#tabelaSocios>tbody>tr>td:last-child>a:last-child').click(function () {
                        let tr = $(this).closest('tr');
                        let row = table.row(tr).data();
                        $('#deleteData').attr('action', route('socios.destroy', row.id).url()).submit();
                    });
                },
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@endsection