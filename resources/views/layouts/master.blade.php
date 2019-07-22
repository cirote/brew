<!DOCTYPE html>
<html lang="es">
@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show
{{--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
--}}
<body class="@yield('module_skin', 'skin-blue') @yield('module_layout', 'sidebar-mini')">
{{--<div id="app" v-cloak>--}}
    <div class="wrapper">

    @yield('main_header')

    @yield('sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        @yield('content_header')

        <!-- Main content -->
            <section class="content">
                @yield('main-content')
            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->

        @yield('control_sidebar')

        @yield('footer')

    </div><!-- ./wrapper -->
{{--</div>--}}
@section('scripts')
    @include('layouts.partials.scripts')
@show
</body>
</html>
