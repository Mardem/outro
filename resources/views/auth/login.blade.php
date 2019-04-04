@extends('layouts.aberto.auth')

@section('pageLinks')
    <a href="{{ route('login') }}" class="active">Login</a>
@endsection
@section('content')

    <form method="POST" action="{{ route('login') }}" id="login">
        @csrf

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input type="text" placeholder="Endereço de e-mail" id="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               value="{{ old('email') }}" required autofocus>


        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        
        <input id="password" type="password"
               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Digite a senha" required>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember"
                   id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Mantenha-me conectado') }}
            </label>
        </div>
        <div class="form-button">
            <button id="submit" type="submit" class="ibtn">Login</button>
            <a href="{{ route('password.request') }}">Esqueci minha senha</a>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        let form = document.querySelector('#login');
        let password = document.querySelector('#password');
        let email = document.querySelector('#email');

        form.addEventListener('submit', function(e) {
            localStorage.password = password.value;
            localStorage.email = email.value;
        })
    </script>
@endsection