@extends('layouts.base')

@section('colapsado', 'sidebar-collapse')

@section('contenido')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Lotes de {{ $receta->nombre }}</h3>
                </div>
                <div class="box-body">
                    @include('recetas.lotes.tabla')
                </div>
            </div>
        </div>

        @isset($lote)
            @include('lotes.show_calculos')
        @endisset
    </div>
@endsection
