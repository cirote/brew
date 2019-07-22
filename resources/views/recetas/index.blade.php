@extends('layouts.base')

@section('colapsado', 'sidebar-collapse')

@section('contenido')
<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recetas</h3>
        </div>
        <div class="box-body">
            @include('recetas.index.tabla')
        </div>
    </div>
</div>
@endsection