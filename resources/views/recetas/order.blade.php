@extends('layouts.base')

@section('main')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="display-3">Recetas</h1>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                </tr>
                </thead>
                <tbody>
                @foreach($receta->maltas as $malta)
                    <tr>
                        <td>{{ $malta->id }}</td>
                        <td>{{ $malta->nombre }}</td>
                        <td>{{ $malta->pivot->cantidad->division(100)->multiply(29.5) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-md-9">
        @include('recetas.order.lupulos')
        </div>

    </div>
@endsection