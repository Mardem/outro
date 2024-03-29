@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeSociosCheque', 'active')
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
                                <p class="mb-0 text-right">Total de sócios cheque</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">{{ $total }}</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> todos sócios cheque cadastrados
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
                        <a href="{{ route('sociosCheque.create') }}" class="btn btn-outline-primary">Novo sócio cheque</a>
                    </span>
                    @endcan
                    <h4 class="card-title">Sócios cheque</h4>
                    <p class="card-description">
                        Veja, edite e apague os sócios cheque do sistema.
                    </p>
                    <form action="{{ route('searchSocioCheque') }}" method="get" class="form-inline mt-2 mb-4" novalidate>
                        <input type="text" name="socio" class="form-control w-25 mr-1" placeholder=" Digite a sua busca">
                        <button class="btn btn-primary">Pesquisar</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome do Emitente</th>
                                <th>CPF/CNPJ</th>
                                <th>Título</th>
                                <th>Operador</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($socios as $socio)
                                <tr>
                                    <td>{{ $socio->emitente }}</td>
                                    <td>{{ $socio->cpf_cnpj }}</td>
                                    <td>{{ $socio->titulo }}</td>
                                    <td>
                                        @php
                                            try {
                                                echo $socio->operador->name;
                                            } catch (\Exception $exception) {
                                                echo "Sem operador";
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        {!! $socio->situacao_formated !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('sociosCheque.show', [$socio->getKey()]) }}"
                                           class="btn btn-primary btn-sm btn-block mb-1">Ver</a>
                                        @if(\Auth::user()->category == 1)
                                            <form action="{{ route('sociosCheque.destroy', $socio->getKey()) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-block">Apagar
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <p style="text-align: center">
                                    Nenhum dado registrado.
                                </p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                        {{ $socios->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
