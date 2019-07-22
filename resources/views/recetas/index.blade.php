@extends('layouts.base')

@section('contenido')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="display-3">Recetas</h1>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td colspan=3>Tamano del lote</td>
                    <td colspan=2>Acciones</td>
                </tr>
                </thead>
                <tbody>
                @foreach($recetas as $receta)
                    <tr>
                        <td>{{ $receta->id }}</td>
                        <td>
                            <a target="_blank" rel="noopener noreferrer" href="{{ $receta->link }}">{{ $receta->nombre }}</a>
                        </td>
                        <td>
                            <a href="{{ route('recetas.order', ['receta' => $receta->id, 'volumen' => 20]) }}" class="btn btn-success">20</a>
                        </td>
                        <td>
                            <a href="{{ route('recetas.order', ['receta' => $receta->id, 'volumen' => 25]) }}" class="btn btn-success">25</a>
                        </td>
                        <td>
                            <a href="{{ route('recetas.order', ['receta' => $receta->id, 'volumen' => 30]) }}" class="btn btn-success">30</a>
                        </td>
                        <td>
                            <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('recetas.destroy', $receta->id) }}" method="post">
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