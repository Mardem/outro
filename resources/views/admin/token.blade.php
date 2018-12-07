@extends('layouts.admin.main')

@section('dashActive', 'active')
@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description lead text-center">
                        Olá, <b class="text-primary">{{ Auth::user()->name }}</b> para a sua segurança digite a sua senha abaixo.
                    </p>

                    <form action="{{ route('updateToken') }}" method="post">
                        @csrf
                        <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
                        <button class="btn btn-outline-success mt-2">Confirmar</button>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

@endsection