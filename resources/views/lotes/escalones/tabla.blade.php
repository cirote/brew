<div class="table-responsive">
    <table class="table table-hover table-striped table-condensed">
        <tr>
            <th>#</th>
            <th>Temperatura</th>
            <th>Minutos</th>
        </tr>
        <tbody>
        @foreach($lote->macerado->escalones as $escalon)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @if($escalon->temperatura->val() == 100)
                    <td>Hervido</td>
                @else
                    <td>{{ $escalon->temperatura }}</td>
                @endif
                <td>{{ $escalon->minutos }}
                @if($escalon->temperatura->val() == 100)
                @if($lote->macerado->hervido->aguaAAgregar->val() < 0)
                    ( {{ number_format($escalon->minutos + $lote->macerado->hervido->minutosAAgregar, 0) }} )
                @endif  
                @endif    
                 minutos</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
