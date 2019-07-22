@extends('layouts.base')

@section('colapsado', 'sidebar-collapse')

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h1 class="display-3">Lotes de la receta de {{ $receta->nombre }}</h1>
                </div>
                <div class="box-body">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Lotes</h3>
                </div>
                <div class="box-body">
                    @include('recetas.lotes.tabla')
                </div>
            </div>
        </div>

        @isset($lote)
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Lote realizado el {{ $lote->fecha }}</h3>
                </div>
                <div class="box-body">
                    @include('recetas.lotes.tabla')
                </div>
            </div>
        </div>
        @endisset
    </div>
@endsection