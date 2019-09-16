<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th width="20%">Cantidad</th>
        </tr>
        <tbody>
        @foreach($lote->macerado->maltas as $malta)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $malta->nombre }}</td>
                <td align="right">{{ $malta->pivot->cantidad->convert('g') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
