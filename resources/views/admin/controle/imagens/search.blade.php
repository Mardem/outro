@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeImages', 'active')
@section('content')

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('imagens.search') }}" method="get" class="form-inline mt-2 mb-4">
                        <input type="text" name="search" class="form-control w-25 mr-1"
                               placeholder=" Digite a sua busca">
                        <button class="btn btn-primary">Pesquisar</button>
                    </form>

                    <span class="float-right">
                        <a href="{{ route('imagens.create') }}" class="btn btn-outline-primary">Nova imagem</a>
                    </span>
                    <h4 class="card-title">Imagens</h4>
                    <p class="card-description">
                        Veja e apague os imagens do sistema.
                    </p>
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            <td>Sócio</td>
                            <td>Criação</td>
                            <td>Ações</td>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($images as $image)
                            <tr>
                                <td>{{ $image->partner->nome }}</td>
                                <td>{{ $image->date_formated }}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button"
                                           id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            Ações
                                        </a>

                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-divider mb-0"></div>
                                            <a class="dropdown-item text-primary p-2"
                                               href="{{ route('imagens.show', $image->getKey()) }}">Ver</a>
                                            <div class="dropdown-divider mb-0 mt-0"></div>

                                            <form action="{{ route('imagens.destroy', $image->getKey()) }}"
                                                  method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item text-danger p-2" href="#">Apagar</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $images->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection