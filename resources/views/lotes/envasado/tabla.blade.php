<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Envase</th>
            <th>Cantidad</th>
        </tr>
        <tbody>
        @foreach($lote->macerado->escalones as $escalon)
            <tr>
                <td>{{ $loop->iteration }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
