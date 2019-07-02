@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeOcorrencia', 'active')
@section('content')

<input type="hidden" id="userIDSelect">

<form action="{{ route('ocorrencia.store') }}" method="post" id="form-send" novalidate>
    @csrf

    <div class="row">
        <div class="col-sm-12 grid-margin-strech-card mb-1">
            <div class="card">
                <div class="card-body">
                    <div class="cad-title">
                        <nav class="breadcrumb" style="margin: 0">
                            <a class="breadcrumb-item" href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                            <span class="breadcrumb-item active">Cadastrar nova ocorrência</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dados ocorrências</h4>
                    <p class="card-description">
                        Preencha os campos com dados da ocorrência
                    </p>

                    <div class="form-group">
                        <label for="tipo_socio">Tipo de sócio</label>
                        <select name="tipo_socio" id="tipo_socio" class="form-control">
                            @foreach (\App\Models\Gerenciamento::TIPO_SOCIO as $key => $value)
                            <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="div_socio">
                        @if($request->has('id') && $request->has('name'))
                        <label for="socios" style="font-size: 20px">Sócio selecionado
                            <b>{{ $request->name }}</b></label>
                        <input type="hidden" id="socios" name="socio_id" value="{{ $request->id }}">
                        @else
                        <label for="socios">Sócio*:</label>
                        <select id="socios" name="socio_id" required>
                            <option disabled>Selecione o sócio</option>
                        </select>
                        @endif
                    </div>

                    <div class="form-group" style="display:none" id="div_socio_cheque">
                        @if($request->has('id') && $request->has('name'))
                        <label for="sociosCheque" style="font-size: 20px">Sócio cheque selecionado
                            <b>{{ $request->name }}</b></label>
                        <input type="hidden" id="socios_cheque" name="socio_cheque_id" value="{{ $request->id }}">
                        @else
                        <label for="sociosCheque">Sócio cheque*:</label>
                        <select id="sociosCheque" name="socio_cheque_id" required>
                            <option disabled>Selecione o sócio cheque</option>
                        </select>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-6 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contato</h4>
                    <p class="card-description">
                        Preencha os campos com os dados do contato
                    </p>


                    <div class="form-group">
                        <label for="situacao">Situação*:</label>
                        <select name="situacao" id="situacao" class="form-control" required>
                            <option value="1">Resolvido</option>
                            <option value="2">Não Resolvido</option>
                            <option value="3">Agendado</option>
                        </select>
                    </div>

                    <div class="form-group" id="data_hora" style="display: none;">

                        <label for="dpn">Data do Contato*</label>
                        <input type="text" class="span2 form-control" id="dpn" name="data_hora" autocomplete="off">
                    </div>


                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-car">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-block btn-outline-success" type="submit" id="salvar">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/admin/datepicker/foundation-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/ocorrencia.js') }}"></script>
<script>
    $(document).ready(function () {
            getPartners('{{ route('api.login') }}', '{{ route('jsonPartners') }}');
            getChequePartners('{{ route('api.login') }}', '{{ route('jsonChequePartners') }}');

            $('#tipo_socio').on('change', function(){
                $('#div_socio_cheque').toggle();
                $('#div_socio').toggle();
            });
        });
</script>
@endsection