<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Envase</th>
            <th>Litros</th>
        </tr>
        <tbody>
        @php($fechaAnterior = '')
        @foreach($lote->envases as $envase)
            @php($fecha = $envase->bottled_at->format('d/m/Y'))
            <tr>
                @if($fecha != $fechaAnterior)
                    <td>{{ $envase->bottled_at->format('d/m/Y') }}</td>
                    @php($fechaAnterior = $fecha)
                @else
                    <td></td>
                @endif
                <td>{{ $envase->producto }}</td>
                <td style="text-align: right">{{ $envase->cantidad }}</td>
                <td>{{ $envase->tipo->denominacion }}</td>
                <td style="text-align: right">{{ number_format($envase->litros, 2, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
        <tr>
            <td colspan="3">Total</td>
            <td style="text-align: right"></td>
            <td style="text-align: right">{{ number_format($lote->litros, 2, ',', '.') }}</td>
        </tr>
    </table>
</div>
