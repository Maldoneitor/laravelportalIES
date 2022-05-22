@extends('empresa.plantilla')
@section('titulo')
Crear representante
@endsection
@section('contenido')
<form action="{{route("editarRepresentantePost",$representante[0]->idRepresentante)}}" method="post">
    @csrf
    <input name="nombre" value="{{$representante[0]->nombre}}"/>
    @error('nombre')
    <p>{{$message}}</p>
    @enderror
    <input name="nif" value="{{$representante[0]->nif}}" readonly/>
    @error('nif')
        <p>{{$message}}</p>
    @enderror
    <input name="correo" value="{{$representante[0]->correo}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input name="telefono" value="{{$representante[0]->telefono}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <input name="cargo" value="{{$representante[0]->cargo}}"/>
    @error('cargo')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Editar representante</button>
</form>


@endsection