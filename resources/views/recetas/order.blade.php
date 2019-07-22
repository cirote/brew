@extends('layouts.base')

@section('colapsado', 'sidebar-collapse')

@section('contenido')
<br>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h1 class="display-3">Receta de {{ $receta->nombre }}</h1>
            </div>
            <div class="box-body">
                <h2>Densidad Inicial: {{ $receta->gravedadOriginal }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Maltas</h3>
            </div>
            <div class="box-body">
                @include('recetas.order.maltas')
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lupulos</h3>
            </div>
            <div class="box-body">
                @include('recetas.order.lupulos')
            </div>
        </div>
    </div>

</div>
@endsection