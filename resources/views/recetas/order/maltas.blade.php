<table class="table table-striped">
    <thead>
    <tr>
        <td>#</td>
        <td>Nombre</td>
        <td>Cantidad</td>
    </tr>
    </thead>
    <tbody>
    @foreach($receta->maltas as $malta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $malta->nombre }}</td>
            <td>{{ $malta->pivot->cantidad->division(100)->multiply(29.5) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>