@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 1em; margin-bottom: 0.5em;">
        <strong>¡{{ trans('alerts.success') }}!. {{ Session::get("success") }}</strong>
    </div>
@endif

@if(Session::has('info'))
    <div class="alert alert-info" role="alert" style="margin-top: 1em; margin-bottom: 0.5em;">
        {!! Session::get("info") !!}
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning" role="alert" style="margin-top: 1em; margin-bottom: 0.5em;">
        <strong>{{ Session::get("warning") }}</strong>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert" style="margin-top: 1em; margin-bottom: 0.5em;">
        <strong>{{ Session::get("error") }}</strong>
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert" style="margin-top: 1em; margin-bottom: 0.5em;">
        <strong>¡Oops!</strong> {{ trans('alerts.error_message') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div id="global_alerts" name="global_alerts" style="margin-top: 1em; margin-bottom: 0.5em; display: none;"></div>