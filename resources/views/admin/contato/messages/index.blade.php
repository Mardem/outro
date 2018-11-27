@extends('layouts.admin.main')

@section('showContact', 'show')
@section('activeSMS', 'active')
@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3 offset-md-3 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-message text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Mensagens enviadas</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $count->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todas mensagens enviadas
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
                        <a href="{{ route('sms.create') }}" class="btn btn-outline-primary">Nova mensagem</a>
                    </span>
                    <h4 class="card-title">Mensagens</h4>
                    <p class="card-description">
                        Veja todas as mensagens que foram enviadas.
                    </p>

                    @component('layouts.components.pesquisa')
                        <input type="hidden" name="tipo" value="1">
                    @endcomponent

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mensagem</th>
                                <th>Telefone</th>
                                <th>Tipo de envio</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>
                                        @if($message->type == 0)
                                            <b class="text-primary">Mensgem direta</b>
                                            @else
                                            <b class="text-success">Mensagem múltipla</b>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        let options = {
            url: "{{ route('jsonSocios') }}",
            getValue: "nome",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $("#pesquisa").easyAutocomplete(options);

        // Envia a pesquisa
        $('#sendSearch').on("click", function () {
            $('#form-search').submit();
        });
    </script>
@endsection