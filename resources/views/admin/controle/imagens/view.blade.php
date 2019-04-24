@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeImages', 'active')
@section('content')
    <nav class="breadcrumb mb-3">
            <a class="breadcrumb-item" href="{{ route('imagens.index') }}">Imagens</a>
        <span class="breadcrumb-item active">Visualizando imagens de <b>{{ $image->partner->nome }}</b></span>
    </nav>

    <div class="row">
        <div class="col-sm-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <strong>Imagens enviadas</strong>
                    <div class="row">
                        @foreach($urls as $url)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">
                                            Imagem inserida em {{ $url->date_created_formated }}
                                        </p>
                                        <a href="{{ $url->link_dropbox }}" class="btn btn-primary" target="_blank">Abrir link</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
