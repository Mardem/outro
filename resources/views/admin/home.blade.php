@extends('layouts.admin.main')

@section('dashActive', 'active')
@section('content')

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
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Notificações</h4>
                    <p class="card-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Dia</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Pagamento dia 12/12/2012</td>
                                <td>12/12/2012</td>
                                <td class="text-danger">
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Administrar
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="#">
                                                <i class="ti-eye"></i> Ver</a>
                                            <a class="dropdown-item" href="#"><i class="ti-pencil"></i>
                                                Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti-trash"></i>Apagar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Pagamento dia 12/12/2012</td>
                                <td>12/12/2012</td>
                                <td class="text-danger">
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Administrar
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="#">
                                                <i class="ti-eye"></i> Ver</a>
                                            <a class="dropdown-item" href="#"><i class="ti-pencil"></i>
                                                Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti-trash"></i>Apagar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Pagamento dia 12/12/2012</td>
                                <td>12/12/2012</td>
                                <td class="text-danger">
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Administrar
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="#">
                                                <i class="ti-eye"></i> Ver</a>
                                            <a class="dropdown-item" href="#"><i class="ti-pencil"></i>
                                                Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"><i
                                                        class="ti-trash"></i>Apagar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection