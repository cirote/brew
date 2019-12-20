<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th width="20%">Cantidad</th>
        </tr>
        <tbody>
        @php($cantidad = 0)
        @foreach($lote->macerado->maltas as $malta)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $malta->nombre }}</td>
                <td align="right">{{ $malta->pivot->cantidad->convert('g') }}</td>
                @php($cantidad += $malta->pivot->cantidad->convert('g')->val())
            </tr>
        @endforeach
        </tbody>
        <tr>
            <td colspan="2">Total</td>
            <td align="right">{{ number_format($cantidad, 2, ',', '.') }} g</td>
        </tr>
    </table>
</div>
