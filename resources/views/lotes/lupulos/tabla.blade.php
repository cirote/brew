<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Variedad</th>
            <th>AA%</th>
            <th>Cantidad</th>
            <th>Hervido</th>
        </tr>
        <tbody>
        @foreach($lote->macerado->hervido->lupulos as $lupulo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lupulo->variedad }}</td>
                <td align="right">{{ $lupulo->pivot->aa }}</td>
                <td align="right">{{ $lupulo->pivot->cantidad }}</td>
                <td align="right">{{ $lupulo->pivot->momento->minutes }} minutos</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
