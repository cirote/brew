@extends('layouts.base')

@section('main')
    <div id="app" class="content">
        <example-component></example-component>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h1 class="display-3">Recetas</h1>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{ $receta->id }}</td>
                        <td>{{ $receta->nombre }}</td>
                        <td>
                            <a href="{{ route('recetas.edit',$receta->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('recetas.destroy', $receta->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection