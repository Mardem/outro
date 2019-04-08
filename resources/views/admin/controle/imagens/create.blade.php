@extends('layouts.admin.main')

@section('showControle', 'show')
@section('activeImages', 'active')
@section('content')

    <nav class="breadcrumb mb-4">
        <a class="breadcrumb-item" href="{{ route('imagens.index') }}">Imagens</a>
        <span class="breadcrumb-item active">Cadastrar nova imagem</span>
    </nav>

    <form action="{{ route('imagens.store') }}" enctype="multipart/form-data" id="formImage" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vínculo</h4>
                        <p class="card-description">
                            Preencha os campos obrigatórios
                        </p>

                        <div class="form-group">
                            <label for="partner_id">Sócio*:</label>
                            <select name="partner_id" id="partner_id" class="form-control" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload</h4>
                        <p class="card-description">
                            Adicione as imagens neste local
                        </p>
                        <input type="file" id="files" name="images[]" class="form-control" multiple>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 grid-margin strech-car">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-success" id="submit" type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/admin/helpers/getPartners.js') }}"></script>
    <script src="{{ asset('js/admin/validateUpload.js') }}"></script>
    <script>

        getPartners('{{ route('api.login') }}', '{{ route('jsonPartners') }}');
    </script>
@endsection