<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Temperatura</th>
            <th>Minutos</th>
        </tr>
        <tbody>
        @foreach($lote->receta->escalones as $escalon)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $escalon->temperatura}}</td>
                <td>{{ $escalon->minutos }} minutos</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
