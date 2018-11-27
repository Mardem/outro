@extends('layouts.admin.main')

@section('showContact', 'show')
@section('activeSMS', 'active')
@section('content')
    <form action="{{ route('sms.store') }}" method="post" id="form-send">
        @csrf

        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('socios.index') }}">Controle</a>
                                <span class="breadcrumb-item active">Enviar uma nova mensagem</span>
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
                        <h4 class="card-title">Mensagem</h4>
                        <p class="card-description">
                            Preencha todos os campos para o envio da mensagem
                        </p>

                        <div class="form-group">
                            <label for="message">Mensagem*:</label>
                            <textarea name="message" id="message" rows="5" class="form-control" style="resize: none"  placeholder="Digite a mensagem a ser enviada" required>{{ old('message') }}</textarea>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Destinatário</h4>
                        <p class="card-description">
                            Selecione o tipo de envio que será utilizado no envio do SMS.
                        </p>
                        <br>
                        <div class="form-group">
                            <label>Tipo de envio:</label>

                            <div class="form-group">
                                <a href="?type=0" class="btn btn-outline-primary" id="direct">Mensagem direta</a>
                                <a href="?type=1" class="btn btn-outline-success" id="multiple">Mensagem múltipla</a>
                            </div>
                            <br>
                            @if($request->input('type') == 0)
                                <input type="hidden" name="type" id="type" value="0">
                                <div class="form-group">
                                    <label for="phone">Nº de telefone:</label>
                                    <br>
                                    <input type="text" class="form-control phone" id="phone" name="phone"
                                           placeholder="Nº de telefone">
                                </div>
                            @else
                                <input type="hidden" name="type" id="type" value="1">
                                <div class="form-group">
                                    <label for="phones">Números de telefone:</label>
                                    <br>
                                    <input type="text" class="form-control" id="phones" name="phone">
                                </div>
                            @endif

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

@section('scripts')
    <script src="{{ asset('js/admin/jquery-tagsinput.js') }}"></script>
    <script src="{{ asset('js/admin/sms.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery-tagsinput.min.css') }}">
@endsection