<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container" style="margin-top:90px;">
        <div class="row">
            <div class="col s12 m6 offset-m3">

                <div class="card-panel z-depth-5">
                    <h4 class="center">Portal del IES Zaidín Vergeles</h4>
                    <h5 class="center">Gestión de practicas para empresas</h5>
                    <div class="row">

                        @yield('contenido')

                    </div>
                    <!--row-->
                </div>
                <!--card-->
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--conatiner-->




    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>