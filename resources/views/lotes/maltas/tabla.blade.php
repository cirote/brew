<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Cantidad</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lote->maltas as $malta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $malta->nombre }}</td>
            <td>{{ $malta->pivot->cantidad }}</td>
        </tr>
    @endforeach
    </tbody>
</table>