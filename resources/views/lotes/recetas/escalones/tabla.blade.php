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
                @if($escalon->temperatura->val() == 100)
                    <td>Hervido</td>
                @else
                    <td>{{ $escalon->temperatura }}</td>
                @endif
                <td>{{ $escalon->minutos }} minutos</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
