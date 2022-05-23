@extends('empresa.plantilla')
@section('titulo')
Crar Tutor
@endsection
@section('contenido')
<form action="{{route("crearTutorPost")}}" method="post">
    @csrf
    <input placeholder="Nombre" name="nombre" value="{{old("nombre")}}"/>
    @error('nombre')
    <p>{{$message}}</p>
    @enderror
    <input placeholder="NIF" name="nif" value="{{old("nif")}}"/>
    @error('nif')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Correo" name="correo" value="{{old("correo")}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Teléfono" name="telefono" value="{{old("telefono")}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Cargo" name="cargo" value="{{old("cargo")}}"/>
    @error('cargo')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Crear tutor</button>
</form>


@endsection