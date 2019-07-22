@extends("layouts.partials.sidebars.sidebar")

@section('sidebar_menu')
<li class="header">@lang('menu.titulo.acuerdos')</li>
<li class="{{ (Request::routeIs('acuerdos.index') OR Request::routeIs('home')) ? "active" : "" }}">
    <a href="{{ route('acuerdos.index', [], false) }}">
        <i class="fa fa-group"></i> <span>@lang('menu.acuerdos')</span>
    </a>
</li>
@endsection