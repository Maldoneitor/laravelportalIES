@extends('empresa.plantilla')
@section('titulo')
Crear representante
@endsection
@section('contenido')
<form action="{{route("editarSedePost",$sede[0]->idSede)}}" method="post">
    @csrf
    <input placeholder="Nombre de Sede" name="nombreSede" value="{{$sede[0]->nombreSede}}"/>
    @error('nombreSede')
    <p>{{$message}}</p>
    @enderror
    <input placeholder="Dirección" name="direccion" value="{{$sede[0]->direccion}}"/>
    @error('direccion')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Código postal" name="codPostal" value="{{$sede[0]->codPostal}}"/>
    @error('codPostal')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Localidad" name="localidad" value="{{$sede[0]->localidad}}"/>
    @error('localidad')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Provincia" name="provincia" value="{{$sede[0]->provincia}}"/>
    @error('provincia')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Email" name="correo" value="{{$sede[0]->correo}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input placeholder="Teléfono" name="telefono" value="{{$sede[0]->telefono}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Editar sede</button>
</form>


@endsection