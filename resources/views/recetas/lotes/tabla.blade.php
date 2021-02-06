<table class="table table-striped">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Litros</th>
        <th>Alc.</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($receta->lotes as $lote)
        <tr>
            <td>{{ $lote->fecha }}</td>
            <td style="text-align: right">{{ number_format($lote->litros, 2, ',', '.') }}</td>
			@if($lote->axv)
            <td style="text-align: right">{{ number_format($lote->axv, 2, ',', '.') }}</td>
			@else
			<td></td>
			@endif
            <td>
                <a href="{{ route('recetas.lotes', ['receta' => $receta, 'lote' => $lote]) }}" class="btn btn-sm btn-success">Info</a>
            </td>
            <td>
                <a href="{{ route('recetas.calculos', ['receta' => $receta, 'lote' => $lote]) }}" class="btn btn-sm btn-success">Calc</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
