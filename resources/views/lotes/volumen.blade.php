<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Resultado del macerado</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                        <tbody>
                            <tr>
                                <td>Agua para el macerado</td>
                                <td>{{ $lote->macerado->agua }}</td>
                            </tr>
                            <tr>
                                <td>Densidad previo al lavado</td>
                                <td>{{ $lote->macerado->densidad_antes_de_lavar }}</td>
                            </tr>
                            <tr>
                                <td>Agua para lavado</td>
                                <td>{{ $lote->macerado->lavado }}</td>
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
								<td>Volumen final del macerado</td>
								<td>{{ $lote->macerado->final }}</td>
							</tr>
							<tr>
								<td>Densidad objetivo del macerado</td>
								<td>{{ $lote->macerado->objetivo }}</td>
							</tr>
							<tr>
								<td>Densidad final del macerado</td>
								<td>{{ $lote->macerado->densidad }}</td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
