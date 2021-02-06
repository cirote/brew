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
								<td>Volumen final del macerado</td>
								<td>{{ $lote->macerado->final }}</td>
							</tr>
	                        <tr>
								<td>Densidad</td>
								<td>{{ $lote->macerado->densidad }}</td>
							</tr>
                            <tr>
                                <td>Volumen de agua previo al hervido</td>
                                <td>{{ $lote->macerado->hervido->volumenPrevio }}</td>
                            </tr>
                            @if($lote->macerado->hervido->aguaAAgregar->val() > 0)
                            <tr>
                                <td>Cantidad de agua a agregar</td>
                                <td>{{ $lote->macerado->hervido->aguaAAgregar }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>Minutos de hervor a agregar</td>
                                <td>{{ number_format($lote->macerado->hervido->minutosAAgregar, 0) }} minutos</td>
                            </tr>
                            @endif
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
                            <tr>
                                <td>Tasa de evaporacion</td>
                                <td>{{ number_format(1 / $lote->macerado->hervido->tasaDeEvaporacion, 3) }} minutos / litro</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
