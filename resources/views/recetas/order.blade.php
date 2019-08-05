@extends('layouts.base')

@section('colapsado', 'sidebar-collapse')

@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h1 class="display-4">Receta: {{ $receta->nombre }}</h1>
            </div>
            <div class="box-body">

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $receta->gravedadOriginal }}</h3>

                            <p>Densidad Inicial</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $receta->gravedadOriginal }}</h3>

                            <p>Densidad Inicials</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $receta->gravedadOriginal }}</h3>

                            <p>Densidad Inicials</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $receta->gravedadOriginal }}</h3>

                            <p>Densidad Inicials</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>

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