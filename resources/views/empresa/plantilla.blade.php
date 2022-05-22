<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/empresa.css') }}">
</head>

<body>
<header>
<nav class="blue-grey">
        <div class="col m2"></div>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Portal de Practicas del IES Zaidín Vergeles</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{route("verEmpresa",$id)}}">Ver datos</a></li>
                <li><a href="{{route("editarEmpresaEmpresa",$id)}}">Modificar datos</a></li>
                <li><a href="#">Solicitudes de practicas</a></li>
            </ul>
        </div>
    </nav>
</header>

    <a href="{{Route("cerrar")}}">cerrar sesion</a>
    @yield('contenido')
    <footer class="page-footer blue-grey">
        <div class="container">
            <div class="row">
                <div class="col 16 s12">
                    <h5 class="white-text">IES Zaidín Vergeles</h5>
                    <p class="grey-text text-lighten-4">Página de prueba para realizar una vista</p>
                </div>
                <div class="col l4 offset-12 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://www.ieszaidinvergeles.org/blog/" target="_blank">Noticias</a></li>
                        <li><a class="grey-text text-lighten-3">Dirección: Avda.Primavera 26-28 18008 Granada - Andalucía</a></li>
                        <li><a class="grey-text text-lighten-3">958 893 850 - 958 894 709</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                IZV © 2022 Todos los derechos reservados.
                <a class="grey-text text-lighten-4 right" href="https://www.ieszaidinvergeles.org" target="_blank">Web IES
                    Zaidín Vergeles</a>
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    {{-- <script src="{{ asset('js/materialize.js') }}" type="module"></script> --}}
</body>

</html>