@extends('layouts.admin.main')

@section('dashActive', 'active')
@section('content')

    @if(\Auth::user()->category == 1)
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="ti-comment text-danger icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Mensagens</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">300</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> total enviadas
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="ti-headphone text-warning icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Atendimentos</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">3455</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> total de atendimentos
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="ti-email text-success icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Emails</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">5693</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> total enviado
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="ti-user text-info icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Funcionários</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">246</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> todos funcionários
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description lead text-center">
                        Seja bem vindo ao sistema, <b class="text-primary">{{ Auth::user()->name }}</b>!
                    </p>

                </div>
            </div>
        </div>

    </div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/iziToast/iziToast.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection



@section('scripts')
    @if(\Auth::user()->category == 2)
        <script src="{{ asset('admin/vendors/iziToast/iziToast.min.js') }}"></script>
        <script src="{{ asset('js/notificacoes.js') }}"></script>

        <script>
            @php
                try {
                $i = 0;
                while($i <= ($notifications[0]->get('qntd') - 1)) {

            @endphp
            notificacoes("{{ $notifications[$i]->get('nome') }}", "{{ $notifications[$i]->get('data_formatada') }}");
            @php
                $i++;
                    }
                } catch (\Exception $e) {

                }
            @endphp
        </script>

    @endif
@endsection