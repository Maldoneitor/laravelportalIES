@extends('empresa.plantilla')
@section('titulo')
Crear Tutor
@endsection
@section('contenido')
<form action="{{route("editarTutorPost",$tutor[0]->idTutorLaboral)}}" method="post">
    @csrf
    <input name="nombre" value="{{$tutor[0]->nombre}}"/>
    @error('nombre')
    <p>{{$message}}</p>
    @enderror
    <input name="nif" value="{{$tutor[0]->nif}}" readonly/>
    @error('nif')
        <p>{{$message}}</p>
    @enderror
    <input name="correo" value="{{$tutor[0]->correo}}"/>
    @error('correo')
        <p>{{$message}}</p>
    @enderror
    <input name="telefono" value="{{$tutor[0]->telefono}}"/>
    @error('telefono')
        <p>{{$message}}</p>
    @enderror
    <input name="cargo" value="{{$tutor[0]->cargo}}"/>
    @error('cargo')
        <p>{{$message}}</p>
    @enderror
    <button type="submit">Editar tutor</button>
</form>


@endsection