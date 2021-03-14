<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lote realizado el {{ $lote->fecha }}</h3>
        </div>
        <div class="box-body">
            <row>
                @include('lotes.volumen')
            </row>

            <row>
                @include('lotes.hervido')
            </row>

            <row>
                @include('lotes.lupulosAjustados')
                @include('lotes.lupulos')
            </row>
        </div>
    </div>
</div>
