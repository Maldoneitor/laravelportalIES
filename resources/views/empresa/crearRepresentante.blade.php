@extends('empresa.plantilla')
@section('titulo')
Crar Tutor
@endsection
@section('contenido')
<form action="{{route("crearRepresentantePost")}}" method="post">
    @csrf
    <input name="nombre" value="{{old("nombre")}}"/>
    @error('nombre')
    <p>{{$message}}</p>
    @enderror
    <input name="nif" value="{{old("nif")}}"/>
    @error('nif')
        <p>{{$message}}</p>
    @enderror
    <input name="correo" value="{{old("correo")}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input name="telefono" value="{{old("telefono")}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <input name="cargo" value="{{old("cargo")}}"/>
    @error('cargo')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Crear representante</button>
</form>


@endsection