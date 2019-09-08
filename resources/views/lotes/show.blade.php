<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lote realizado el {{ $lote->fecha }}</h3>
        </div>
        <div class="box-body">
            <row>
                @include('lotes.maltas')
                @include('lotes.lupulos')
            </row>

            @include('lotes.volumen')
            @include('lotes.hervido')
            @include('lotes.lupulosAjustados')
        </div>
    </div>
</div>
