@extends('layouts.admin.main')

@section('showContact', 'show')
@section('activeEmail', 'active')
@section('content')

    <br>
    <form action="{{ route('email.store') }}" method="post" id="form-send">
        @csrf

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <span class="breadcrumb-item active">Enviar Email</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Seus sócios</h4>
                        <div class="card-body" style="padding: 0;">
                            <div class="table-responsive">
                                <table id="tableDataTable"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dados email</h4>
                        <p class="card-description">
                            Preencha os campos com dados do email
                        </p>

                        <div class="form-group">
                            <div class="form-group col-md-4">
                                <label for="socio">Email*:</label>

                                <input type="text" name="data[]" class="form-control" id="emails">

                                {{--
                                <select multiple="multiple" style="width:90%;" id="testSelect" name="data[]">
                                    @foreach($socios as $socio)
                                        <option value="{{ $socio->email }}">{{ $socio->nome }}</option>
                                    @endforeach
                                </select>
                                --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-4">
                                <label for="tipo">Título*:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                       placeholder="Digite o título!" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-12">
                                <label for="mensagem">Mensagem*</label>
                                <textarea class="form-control" id="mensagem" style="resize: none;" name="mensagem"
                                          placeholder="Digite a mensagem!" required></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/dataTable/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-tagsinput.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/ziggy.js') }}"></script>
    <script src="{{ asset('js/admin/jquery-tagsinput.js') }}"></script>
    <script src="{{ asset('js/admin/helper.js') }}"></script>

    <script>
        $('#emails').tagsInput();
        let columns = [
            {data: 'id', title: 'Código'},
            {data: 'nome', title: 'Sócio'},
            {data: 'email', title: 'Email'},
            {
                data: null,
                title: 'Ações',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html("<a href='javascript:void(0);' class='btn btn-outline-primary btn-sm btn-block'>Ver</a>");
                }
            }
        ];
        jsonDataTables("{{ route('partnersOperator') }}", "{{ \Auth::user()->token  }}", columns, 'socios');
    </script>
@endsection