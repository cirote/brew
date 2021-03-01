<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Resultados de la fermentación</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                        <tbody>
							<tr>
								<td>Fermentador</td>
                                <td>{{ $lote->fermentado->fermentador->nombre }}</td>
							</tr>
                            <tr>
                                <td>Volumen en el fermentador</td>
                                <td>{{ $lote->fermentado->volumen_inicial }}</td>
                            </tr>
	                        <tr>
								<td>Levadura utilizada</td>
                                <td>({{ $lote->fermentado->levadura->nombre }}) {{ $lote->fermentado->levadura->descripcion }}</td>
							</tr>
                            <tr>
                                <td>Temperatura ideal</td>
                                <td>{{ $lote->fermentado->levadura->temperatura }}</td>
                            </tr>
                            <tr>
                                <td>Estado de la levadura</td>
                                <td>{{ $lote->fermentado->levadura_estado }}</td>
                            </tr>
	                        <tr>
								<td>Atenuación (Mínima / Real / Máxima)</td>
                                <td>{{ $lote->fermentado->levadura->atenuacion_minima }} / {{ $lote->fermentado->atenuacion }} / {{ $lote->fermentado->levadura->atenuacion_maxima }}</td>
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
                                <td>Densidad inicial</td>
                                <td>{{ $lote->fermentado->densidad_inicial }}</td>
                            </tr>
                            <tr>
                                <td>Densidad final</td>
                                <td>{{ $lote->fermentado->densidad_final }}</td>
                            </tr>
                            <tr>
                                <td>Porcentaje de Alcohol por volumen</td>
                                <td>{{ number_format($lote->axv, 2, ',', '.') }}%</td>
                            </tr>
                            <tr>
                                <td>Fecha de inicio</td>
								<td>{{ $lote->fecha }}</td>
                            </tr>
                            <tr>
                                <td>Fecha de finalización</td>
								<td>{{ $lote->fecha_envasado }}</td>
                            </tr>
                            <tr>
                                <td>Días de fermentación</td>
                                <td>{{ $lote->dias_de_fermentacion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
