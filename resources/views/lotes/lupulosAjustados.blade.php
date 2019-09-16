@php($volumen = $lote->macerado->hervido->volumenEstimado)
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Lupulos de la receta ajustados para {{ $volumen }}</h3>
        </div>
        <div class="box-body">
            @include('lotes.lupulosAjustados.tabla')
        </div>
    </div>
</div>
