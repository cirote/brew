<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.12/css/AdminLTE.min.css" integrity="sha256-3erATO26AUHbD7yzfeSJyFSrcNQ88SkDAXvt0ZMT38U=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.12/css/skins/_all-skins.min.css" integrity="sha256-ZlEo/0WbhG/pXIL3zcbJoTW9lFxlmSu8a7syXHfTURo=" crossorigin="anonymous" />

    <title>Recetas de Cerveza</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container">
        @yield('main')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.12/js/adminlte.min.js" integrity="sha256-1LHRbcgIgH8dB6nzzUOnjRzh8mwxxJAa2UYfJYH3QJM=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
