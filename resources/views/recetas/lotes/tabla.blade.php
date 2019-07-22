<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($receta->lotes as $lote)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $lote->fecha }}</td>
            <td>
                <a href="{{ route('recetas.lotes', ['receta' => $receta, 'lote' => $lote]) }}" class="btn btn-success">Ver</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
