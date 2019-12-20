<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Litros</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($receta->lotes as $lote)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $lote->fecha }}</td>
            <td style="text-align: right">{{ number_format($lote->litros, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('recetas.lotes', ['receta' => $receta, 'lote' => $lote]) }}" class="btn btn-sm btn-success">Ver</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
