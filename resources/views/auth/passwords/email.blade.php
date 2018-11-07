@extends('layouts.aberto.auth')

@section('subdescription')
    Insira seu endereço de e-mail para a redefinição de senha, nós vamos mandar um email para você mudar sua senha.
@endsection

@section('pageLinks')
    <a href="{{ route('login') }}">Voltar para o login</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">

            <div class="col-md-12">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder=" Digite o email" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" style="background: #8D130E">
                {{ __('Enviar link de redefinição de senha') }}
            </button>
        </div>
    </form>
@endsection
