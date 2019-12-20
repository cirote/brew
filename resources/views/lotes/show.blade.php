<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Lote realizado el {{ $lote->fecha }}</h3>
        </div>
        <div class="box-body">
            <row>
                @include('lotes.recetas.maltas')
                @include('lotes.maltas')
            </row>

            <row>
                @include('lotes.recetas.escalones')
                @include('lotes.escalones')
            </row>

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

{{--            <row>--}}
{{--                @include('lotes.fermentado')--}}
{{--                @include('lotes.envasado')--}}
{{--            </row>--}}
        </div>
    </div>
</div>
