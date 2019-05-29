@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeUsuarios', 'active')
@section('content')
    <form action="{{ route('usuario.update', ['id' => $usuario->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-12 grid-margin-strech-card mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="cad-title">
                            <nav class="breadcrumb" style="margin: 0">
                                <a class="breadcrumb-item" href="{{ route('usuario.index') }}">Usuários</a>
                                <span class="breadcrumb-item active">Visualizando <b>{{ $usuario->name }}</b></span>
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
                        <h4 class="card-title">Dados pessoais</h4>


                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder=" Digite o nome do usuário" value="{{ $usuario->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder=" Digite o CPF"
                                   value="{{ $usuario->cpf }}" required>
                        </div>

                        <div class="form-group">
                            <label for="perfil">Perfil:</label>
                            <select name="category" id="perfil" class="form-control" required>

                                <option disabled>Selecionado:</option>
                                @if($usuario->category == 1)
                                    <option value="1">Administrador</option>
                                @elseif($usuario->category == 2)
                                    <option value="2">Operador</option>
                                @else
                                    <option value="0">Sócio</option>
                                @endif
                                <option disabled></option>
                                <option disabled>Outras opções</option>

                                <option value="2">Operador</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Acesso ao sistema</h4>

                        <div class="form-group">
                            <label for="email">E-Mail:</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder=" Digite o email de acesso ao sistema" value="{{ $usuario->email }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder=" Senha de acesso">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar senha:</label>
                            <input type="password" class="form-control" placeholder=" Digite a senha novamente">
                        </div>

                        <div class="form-group">
                            <label for="situacao">Situação:</label>
                            <select name="situacao" id="situacao" class="form-control">

                                <option disabled>Selecionado:</option>
                                @if($usuario->situacao == 0)
                                    <option value="0">Ativo</option>
                                @elseif($usuario->situacao == 1)
                                    <option value="1">Inativo</option>
                                @endif
                                <option disabled></option>
                                <option disabled>Outras opções</option>

                                <option value="0">Ativo</option>
                                <option value="1">Inativo</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection
