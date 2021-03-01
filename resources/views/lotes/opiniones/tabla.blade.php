<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Opinante</th>
            <th>Puntaje</th>
            <th>Opinion</th>
        </tr>
        <tbody>
        @foreach($lote->opiniones as $opinion)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $opinion->opinante }}</td>
                <td align="center">{{ $opinion->puntaje }}</td>
                <td align="left">{{ $opinion->opinion }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
