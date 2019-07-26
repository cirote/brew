<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>#</th>
            <th>Variedad</th>
            <th>AA%</th>
            <th>Uso</th>
            <th>Cantidad</th>
        </tr>
        <tbody>
        @foreach($lote->lupulos as $lupulo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lupulo->variedad }}</td>
                <td>{{ $lupulo->aa }}</td>
                <td>{{ $lupulo->pivot->uso }}</td>
                <td>{{ $lupulo->pivot->cantidadAjustada }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
