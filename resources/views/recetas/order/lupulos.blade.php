<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th width="5%">#</th>
            <th width="40%">Variedad</th>
            <th width="5%">AA%</th>
            <th width="15%">Uso</th>
            <th width="15%">Cantidad</th>
{{--            <th width="20%">Eq. Columbus</th>--}}
        </tr>
        <tbody>
        @foreach($receta->lupulos as $lupulo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lupulo->variedad }}</td>
                <td align="right">{{ $lupulo->pivot->aa }}</td>
                <td>{{ $lupulo->pivot->uso }}</td>
                <td align="right">{{ $lupulo->pivot->cantidadAjustada }}</td>
{{--                <td align="right">{{ $lupulo->pivot->equivalenteAmargor }}</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

