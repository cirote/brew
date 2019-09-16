<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Datos estimados para el Hervido</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                        <tbody>
                            <tr>
                                <td>Volumen de agua previo al hervido</td>
                                <td>{{ $lote->macerado->hervido->volumenPrevio }}</td>
                            </tr>
                            <tr>
                                <td>Tasa de evaporacion</td>
                                <td>{{ $lote->macerado->hervido->tasaDeEvaporacion }} %</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                        <tbody>
                            <tr>
                                <td>Volumen estimado en el fermentador</td>
                                <td>{{ $lote->macerado->hervido->volumenEstimado }}</td>
                            </tr>
                            <tr>
                                <td>Volumen real en el fermentador</td>
                                <td>N/D</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
