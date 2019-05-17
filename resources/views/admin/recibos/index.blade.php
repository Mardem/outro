@extends('layouts.admin.main')

@section('ReceiptActive', 'active')
@section('content')

<div class="row">
    <div class="col">
        <div class="form-group">
            <a href="recibos/primeira-etapa" class="btn btn-info">1ª Etapa Itiquira</a>
        </div>
        <div class="form-group">
            <a href="recibos/segunda-etapa" class="btn btn-info">2ª Etapa Itiquira</a>
        </div>
        <div class="form-group">
                <a href="recibos/primeira-e-segunda-etapa" class="btn btn-info">1ª e 2ª Etapa Itiquira</a>
        </div>
        <div class="form-group">
            <a href="recibos/termo-de-cancelamento" class="btn btn-info">Termo de Cancelamento Itiquira</a>
        </div>
        <div class="form-group">
            <a href="recibos/edital-de-vendas" class="btn btn-info">Edital de Vendas Itiquira</a>
        </div>
    </div>
</div>

@endsection