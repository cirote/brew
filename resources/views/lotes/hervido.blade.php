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
                            @if($lote->macerado->hervido->aguaAAgregar->val() > 0)
                            <tr>
								@if($lote->macerado->hervido->inicial)
									<td>Cantidad de agua agregada</td>
								@else
									<td>Cantidad de agua a agregar</td>
								@endif
                                <td>{{ $lote->macerado->hervido->aguaAAgregar }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>Minutos de hervor a agregar</td>
                                <td>{{ number_format($lote->macerado->hervido->minutosAAgregar, 0) }} minutos</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Volumen de agua previo al hervido</td>
                                <td>{{ $lote->macerado->hervido->volumenPrevio }}</td>
                            </tr>
                            <tr>
                                <td>Tasa de evaporacion</td>
                                <td>{{ number_format(1 / $lote->macerado->hervido->tasaDeEvaporacion, 3) }} minutos / litro</td>
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
                                <td>{{ $lote->macerado->hervido->fermentado->volumen_inicial }}</td>
                            </tr>
                            <tr>
                                <td>Densidad inicial de la receta</td>
                                <td>{{ $lote->receta->gravedad_original }}</td>
                            </tr>
                            <tr>
                                <td>Densidad inicial en el fermentador</td>
                                <td>{{ $lote->macerado->hervido->fermentado->densidad_inicial }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
