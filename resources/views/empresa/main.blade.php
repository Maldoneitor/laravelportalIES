@extends('empresa.plantilla')
@section('titulo')
datos de la empresa
@endsection
@section('contenido')

<main>
    <div class="row">
        <div class="col m2">
        </div>
        <div class="col 16 s12 m4">
            <div class="card">
                <div class="card-image">
                    <img class="responsive-img" src="{{ asset('img/imagen2.jpg') }}">
                </div>
                <div class="card-content">
                    <span class="card-title">Desarrollo de Aplicaciones Web</span>
                    <p>La competencia general de este título consiste en desarrollar, implantar, y mantener aplicaciones web,
                        con independencia del modelo empleado y utilizando tecnologías específicas, garantizando el acceso a los
                        datos de forma segura y cumpliendo los criterios de accesibilidad, usabilidad y calidad exigidas en los
                        estándares establecidos.</p>
                </div>
                <div class="card-action">
                    <a href="{{route("peticionPracticas", ["ciclo"=>"2DAW", "ids"=>$empresa[0]->idEmpresa])}}">Hacer petición de practicas</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img class="responsive-img" src="{{ asset('img/imagen1.jpg') }}">
                </div>
                <div class="card-content">
                    <span class="card-title">Desarrollo de Aplicaciones Multiplataforma</span>
                    <p>La competencia general de este título consiste en desarrollar, implantar, documentar y mantener
                        aplicaciones informáticas multiplataforma, utilizando tecnologías y entornos de desarrollo específicos,
                        garantizando el acceso a los datos de forma segura y cumpliendo los criterios de «usabilidad» y calidad
                        exigidas en los estándares establecidos.</p>
                </div>
                <div class="card-action">
                    <a href="{{route("peticionPracticas", ["ciclo"=>"2DAM", "ids"=>$empresa[0]->idEmpresa])}}">Hacer petición de practicas</a>
                </div>
            </div>
        </div>
        <div class="col m2">
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img class="responsive-img" src="{{ asset('img/imagen3.jpg') }}">
                </div>
                <div class="card-content">
                    <span class="card-title">Administracion de Sistemas Informáticos en Red</span>
                    <p>La competencia general de este título consiste en configurar, administrar y mantener sistemas
                        informáticos, garantizando la funcionalidad, la integridad de los recursos y servicios del sistema, con
                        la calidad exigida y cumpliendo la reglamentación vigente.</p>
                </div>
                <div class="card-action">
                    <a href="{{route("peticionPracticas", ["ciclo"=>"2ASIR", "ids"=>$empresa[0]->idEmpresa])}}">Hacer petición de practicas</a>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@if (session("info"))
<p>{{session("info")}} </p>
@endif
@endsection