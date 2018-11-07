@extends('layouts.aberto.auth')

@section('subdescription')
    Para redefinir sua senha, preencha corretamente todos os dados pedidos abaixo.
@endsection

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">

            <label for="email">Digite seu email</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   name="email" value="{{ $email ?? old('email') }}" required autofocus
                   placeholder=" Endereço de e-mail">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="password">Senha</label>
            <input id="password" type="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                   placeholder=" Nova senha" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="password-confirm">Confirme a senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   placeholder=" Confirmação da senha" required>
        </div>

        <div class="form-group row mb-0">
            <button type="submit" class="btn btn-block btn-primary" style="background: #8D130E">
                {{ __('Redefinir Senha') }}
            </button>
        </div>
    </form>
@endsection
