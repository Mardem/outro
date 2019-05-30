@extends('layouts.admin.main')

@section('showGerenciamento', 'show')
@section('activeOcorrencia', 'active')
@section('content')

    <div id="content-trip">
        <div id="print">
            <div class="row no-print">
                <div class="col-sm-12 grid-margin-strech-card mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="cad-title">
                                <nav class="breadcrumb" style="margin: 0">
                                    <a class="breadcrumb-item"
                                       href="{{ route('ocorrencia.index') }}">Gerenciamento</a>
                                    <span class="breadcrumb-item active">Atualizar ocorrência</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('ocorrencia.update', ['id' => $ocorrencia->id]) }}" method="post" id="form-send">
                @csrf
                @method('PUT')
                <div class="row mt-2 mb-2 no-print">
                    <div class="container">
            <span class="float-right" style="margin-right:10px;margin-bottom: 5px;">
                    <button type="button" class="btn btn-primary btn-sm" id="printOccurrence">
                        Imprimir
                    </button>
            </span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 grid-margin strech-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dados da ocorrência</h4>
                                <p class="card-description no-print">
                                    Preencha os campos com dados da ocorrência
                                </p>


                                <div class="form-group">
                                    <label for="socio_id">Sócio*:</label>
                                    <select id="socio_id" name="socio_id" class="form-control" required>

                                        <option disabled>Selecionado:</option>
                                        <option
                                            value="{{ $ocorrencia->socio_id }}">{{ $ocorrencia->socio->nome }}</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Responsável*</label>
                                    <h5>{{ $ocorrencia->operador->name }}</h5>
                                </div>

                                <div class="form-group">
                                    <label for="data_ocorrencia">Data Ocorrência*:</label>
                                    <input type="text" class="form-control" id="data_ocorrencia" disabled
                                           value="{{ $ocorrencia->data_ocorrencia_formated }}" autocomplete="off">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 grid-margin strech-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contato</h4>
                                <p class="card-description no-print">
                                    Preencha os campos com os dados do contato
                                </p>

                                <div class="form-group">
                                    <label for="situacao">Perfil:</label>
                                    <select name="situacao" id="situacao" class="form-control" onchange="mostrar()"
                                            required>

                                        <option disabled>Selecionado:</option>
                                        @if($ocorrencia->situacao == 1)
                                            <option value="1">Resolvido</option>
                                        @elseif($ocorrencia->situacao == 2)
                                            <option value="2">Não Resolvido</option>
                                        @elseif($ocorrencia->situacao == 3)
                                            <option value="3">Agendado</option>
                                        @else
                                            <option value="0">Sócio</option>
                                        @endif

                                        <optgroup label="Outras opções">
                                            <option value="1">Resolvido</option>
                                            <option value="2">Não Resolvido</option>
                                            <option value="3">Agendado</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group" id="data_hora" style="display: none;">

                                    <label for="dpn">Data do Contato*</label>
                                    <input type="text" class="span2 form-control" id="dpn" name="data_hora"
                                           value="{{ $ocorrencia->date_time_notify }}" autocomplete="off">

                                </div>
            </form>

            @if($notification != null)
                <div id="notification">
                    <form
                        action="{{ route('updateNotification', ['notification' => $notification->getKey()]) }}"
                        method="POST"
                        id="updateNot">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="dpn">Data/Hora*</label>
                            <input type="text" class="form-control" id="dpn" name="dataContato"
                                   value="{{ $notification->day_contact_formated }}">
                        </div>
                    </form>
                    <a class="btn btn-success"
                       href="{{ route('updateNotification', ['notification' => $notification->getKey()]) }}"
                       onclick="event.preventDefault();$('#updateNot').submit();">Atualizar
                        notificação</a>
                </div>
            @endif
        </div>

        <div class="row no-print">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success"
                                onclick="event.preventDefault();$('#form-send').submit();">Atualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row no-print">
            <div class="container">
            <span class="float-right" style="margin-right:10px;margin-bottom: 5px;">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mensagens">
                        Adicionar mensagens
                    </button>
            </span>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade show" id="mensagens" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true" style="{{ $mensagens->total() >= 1 ? '' : 'display: block;'}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <form action="{{ route('mensagem.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="ocorrencia_id" value="{{ $ocorrencia->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modelTitleId">Adicionar mensagem</h5>
                        </div>

                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="mensagem">Mensagem*</label>
                                    <textarea class="form-control" id="mensagem" name="mensagem"
                                              placeholder="Digite a mensagem!" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">


                <div class="card card-small mb-4">
                    <div class="card-header border-bottom text-center">
                        <h6 class="m-0">Mensagens <b class="text-success"></b></h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">

                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">Mensagens</th>
                                    <th scope="col" class="border-0">Responsável</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mensagens as $mensagem)
                                    <tr>
                                        <td>{{ str_limit($mensagem->mensagem, 50) }}</td>
                                        <td>{{ $mensagem->responsavel }}</td>
                                        <td class="no-print">
                                            <div class="btn-group dropdown">
                                                <button type="button"
                                                        class="btn btn-success dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Administrar
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a class="dropdown-item"
                                                       href="{{ route('mensagem.show', ['id' => $mensagem->id]) }}"><i
                                                            class="ti-eye"></i> Ver</a>

                                                    <div class="dropdown-divider"></div>

                                                    <form
                                                        action="{{ route('mensagem.destroy', ['id' => $mensagem->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-link text-danger"
                                                                type="submit">
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

                        {{ $mensagens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@if(\Auth::user()->category == 2 && $mensagens->total() < 1)
    @include('layouts.components.tripjs')
@endif

@section('scripts')
    <script src="{{ asset('js/admin/datepicker/foundation-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/notificacoes.js') }}"></script>
    <script>

        $('#data_ocorrencia').datepicker({
            language: 'pt-BR'
        });

        mostrar();

        let notification = '{{ $notification }}';
        let situacao = $('#situacao').val();
        if (notification === null && situacao === 3) {
            $('#data_hora').show();
        } else {
            $('#data_hora').hide();
        }
    </script>
    <script src="{{ asset('js/admin/ocorrencia.js') }}"></script>
@endsection
