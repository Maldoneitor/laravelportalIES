@extends('empresa.plantilla')
@section('titulo')
Crar Tutor
@endsection
@section('contenido')
<form action="{{route("crearRepresentantePost")}}" method="post">
    @csrf
    <input placeholder="name" name="nombre" value="{{old("nombre")}}"/>
    @error('nombre')
    <p>{{$message}}</p>
    @enderror
    <input placeholder="nif" name="nif" value="{{old("nif")}}"/>
    @error('nif')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="correo" name="correo" value="{{old("correo")}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="telefono" name="telefono" value="{{old("telefono")}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="cargo" name="cargo" value="{{old("cargo")}}"/>
    @error('cargo')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Crear representante</button>
</form>


@endsection