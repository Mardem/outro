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


                    {{--
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
                                <tr>
                                    <td>
                                        {{$ocorrencia->socio->nome}}
                                    </td>
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

                                                <form action="{{ route('ocorrencia.destroy', ['id' => $ocorrencia->id]) }}"
                                                      method="post">
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
                    --}}

                    <table id="tabelaOcorrencias" class="table table-striped table-bordered"></table>
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
    <script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/dataTable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>

        $(document).ready(function () {
            let table = $('#tabelaOcorrencias').DataTable({
                ajax: {
                    url: '{{ route('jsonGerenciamento') }}',
                    dataSrc: ""
                },
                responsive: true,
                fixedHeader: true,
                stateSave: true,
                columns: [
                    {data: 'id'},
                    {data: 'socio.nome', title: 'Sócio'},
                    {data: 'data_ocorrencia', title: 'Data da Última Ocorrência'},
                    {data: 'titulo', title: 'Título'},
                    {
                        data: null,
                        title: 'Ações',
                        createdCell: function (td, cellData, rowData, row, col) {
                            $(td).html("<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm'>Ver</a> <a href='javascript:void(0);' class='btn btn-outline-danger btn-sm'>Apagar</a>");
                        }
                    }
                ],
                drawCallback: function () {
                    $('a').unbind('click');
                    $('#tabelaOcorrencias>tbody>tr>td:last-child>a:first-child').click(function () {
                        let tr = $(this).closest('tr');
                        let row = table.row(tr).data();
                        window.location = route('ocorrencia.show', row.id).url();
                    });
                    $('#tabelaOcorrencias>tbody>tr>td:last-child>a:last-child').click(function () {
                        let tr = $(this).closest('tr');
                        let row = table.row(tr).data();
                        $('#deleteData').attr('action', route('ocorrencia.destroy', row.id).url()).submit();
                    });
                },
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
@endsection