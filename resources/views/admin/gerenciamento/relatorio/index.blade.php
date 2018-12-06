@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeRelatorio', 'active')
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
                            <p class="mb-0 text-right">Resultado das buscas</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $ocorrencias->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas ocorrências encontradas
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('searchRelatorio') }}" method="post" class="mb-3">
                        @csrf

                        <div class="row">
                            <div class="col col-sm-4">
                                <div class="form-group">
                                    <label for="data_inicio">De:</label>
                                    <input type="text" class="form-control date" id="data_inicio" name="data_inicio" placeholder="Ex: 99/99/9999" required>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <div class="form-group">
                                    <label for="data_fim">Até:</label>
                                    <input type="text" class="form-control date" id="data_fim" name="data_fim" placeholder="Ex: 99/99/9999" required>
                                </div>
                            </div>
                            <div class="col col-sm-4">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                                </div>
                            </div>
                        </div>

                    </form>

                    <span style="float: right;">
                        <button type="button" class="btn btn-outline-primary" onclick="generatePDF()">Imprimir</button>
                    </span>
                    <h4 class="card-title">Ocorrências</h4>
                    <p class="card-description">
                        Relatório de todas as ocorrências do sistema.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-hover" id="tabelaRelatorio">
                            <thead>
                            <tr>
                                <th>Sócio</th>
                                <th>Data da Ocorrência</th>
                                <th>Título</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ocorrencias as $ocorrencia)
                                <tr>
                                    <td>{{ $ocorrencia->socio->nome }}</td>
                                    <td>
                                        @php
                                            $date = new Date($ocorrencia->data_ocorrencia);
                                        echo $date->format('d/m/Y');
                                        @endphp
                                    </td>
                                    <td>{{ $ocorrencia->titulo }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $ocorrencias->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function generatePDF() {
            let pdf = new jsPDF();

            let res = pdf.autoTableHtmlToJson(document.getElementById("tabelaRelatorio"));


            pdf.autoTable(res.columns, res.data, {
                margin: {
                    top: 10
                },
                styles: {
                    fontSize: 12
                }
            });

            pdf.autoPrint({variant: 'non-conform'});
            window.open(pdf.output("bloburl"));
        }
        $(".date").inputmask({
            mask: ["99/99/9999"],
            keepStatic: true
        });
    </script>
@endsection