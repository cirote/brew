<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Lupulos</h3>
    </div>

    <div class="box-body">

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <td>ID</td>
                    <td>Variedad</td>
                    <td>AA%</td>
                    <td>Uso</td>
                    <td>Cantidad</td>
                    <td>Eq. Columbus</td>
                </tr>
                <tbody>
                @foreach($receta->lupulos as $lupulo)
                    <tr>
                        <td>{{ $lupulo->id }}</td>
                        <td>{{ $lupulo->variedad }}</td>
                        <td>{{ $lupulo->aa }}</td>
                        <td>{{ $lupulo->pivot->uso }}</td>
                        <td>{{ $lupulo->pivot->cantidadAjustada }}</td>
                        <td>{{ $lupulo->pivot->equivalenteAmargor }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
