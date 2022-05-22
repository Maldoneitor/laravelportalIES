@extends('empresa.plantilla')
@section('titulo')
Crar Tutor
@endsection
@section('contenido')
<form action="{{route("crearSedePost")}}" method="post">
    @csrf
    <input placeholder="Nombre de Sede" name="nombreSede" value="{{old("nombre")}}"/>
    @error('nombreSede')
    <p>{{$message}}</p>
    @enderror
    <input placeholder="Dirección" name="direccion" value="{{old("direccion")}}"/>
    @error('direccion')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Código postal" name="codPostal" value="{{old("codPostal")}}"/>
    @error('codPostal')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Localidad" name="localidad" value="{{old("localidad")}}"/>
    @error('localidad')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Provincia" name="provincia" value="{{old("provincia")}}"/>
    @error('provincia')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Email" name="correo" value="{{old("correo")}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Teléfono" name="telefono" value="{{old("telefono")}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Crear sede</button>
</form>


@endsection