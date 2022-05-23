@extends('empresa.plantilla')
@section('titulo')
datos de la empresa
@endsection
@section('contenido')
<form action="{{route("editarEmpresaPost")}}" method="post">
        @csrf
        <input type="text" placeholder="CIF" name="cif" value="{{$empresa[0]->cif}}">
        @error('cif')
        <p>{{$message}}</p>
        @enderror
        
        <input type="text" placeholder="Nombre" name="nombre" value="{{$empresa[0]->nombreComercial}}">
        @error('nombre')
        <p>{{$message}}</p>
        @enderror
        
        <select placeholder="Tipo de empresa" name="tipo">
            <option value="{{$empresa[0]->tipo}}">{{$empresa[0]->tipo}}</option>
            @if($empresa[0]->tipo==="publico")
            <option value="privado">Privada</option>
            @else
            <option value="publico">Pública</option>
            @endif
        </select>
        @error('tipo')
        <p>{{$message}}</p>
        @enderror

        <input type="text" placeholder="Telefono" name="telefono" value="{{$empresa[0]->telefono}}">
        @error('telefono')
        <p>{{$message}}</p>
        @enderror

        <input type="text" placeholder="Web" name="web" value="{{$empresa[0]->web}}" />
        @error('web')
        <p>{{$message}}</p>
        @enderror

        <input type="text" placeholder="Actividad" name="actividad" value="{{$empresa[0]->actividad}}">
        @error('actividad')
        <p>{{$message}}</p>
        @enderror

        <input type="text" placeholder="Horario" name="horario" value="{{$empresa[0]->horario}}">
        @error('horario')
        <p>{{$message}}</p>
        @enderror

        <textarea name="observaciones" placeholder="Observaciones">{{$empresa[0]->observaciones}}</textarea>
        @error('observaciones')
        <p>{{$message}}</p>
        @enderror

        <button type="submit">Guardar</button>
    </form>

    <a href="{{route("crearTutor")}}">Añadir tutor</a>
        <br>
        @if(count($tutores)>0)
            <table>
                <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>NIF</td>
                        <td>Telefono</td>
                        <td>EMail</td>
                        <td>Cargo</td>
                    </tr>

                    {{-- Esto hay que generarlo dinámicamente --}}
                    @foreach ($tutores as $tutor)
                        <tr>
                            <td>{{ $tutor->nombre}}</td>
                            <td>{{ $tutor->nif }}</td>
                            <td>{{ $tutor->telefono }}</td>
                            <td>{{ $tutor->correo }}</td>
                            <td>{{ $tutor->cargo }}</td>
                            <td><a href="{{route("eliminarTutor", $tutor->idTutorLaboral)}}">Eliminar</a></td>
                            <td><a href="{{route("editarTutor", $tutor->idTutorLaboral)}}">Editar</a></td>
                            <td><input type="checkbox" class="marcado" value="{{ $tutor->idTutorLaboral }}"></td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        @endif

        <a href="{{route("crearRepresentante")}}">Añadir representante</a>
        @if(count($representantes)>0)
            <table>
                <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>NIF</td>
                        <td>Telefono</td>
                        <td>EMail</td>
                        <td>Cargo</td>
                    </tr>

                    {{-- Esto hay que generarlo dinámicamente --}}
                    @foreach ($representantes as $representante)
                        <tr>
                            <td>{{ $representante->nombre}}</td>
                            <td>{{ $representante->nif }}</td>
                            <td>{{ $representante->telefono }}</td>
                            <td>{{ $representante->correo }}</td>
                            <td>{{ $representante->cargo }}</td>
                            <td><a href="{{route("eliminarRepresentante", $representante->idRepresentante)}}">Eliminar</a></td>
                            <td><a href="{{route("editarRepresentante", $representante->idRepresentante)}}">Editar</a></td>
                            <td><input type="checkbox" class="marcado" value="{{ $representante->idRepresentante}}"></td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        @endif
        
        <a href="{{route("crearSede")}}">Añadir sede</a>
        @if(count($sedes)>0)
            <table>
                <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td>Dirección</td>
                        <td>Código postal</td>
                        <td>Localidad</td>
                        <td>Provincia</td>
                        <td>Telefono</td>
                        <td>EMail</td>
                        
                    </tr>

                    {{-- Esto hay que generarlo dinámicamente --}}
                    @foreach ($sedes as $sede)
                        <tr>
                            <td>{{ $sede->nombreSede}}</td>
                            <td>{{ $sede->direccion }}</td>
                            <td>{{ $sede->codPostal }}</td>
                            <td>{{ $sede->localidad }}</td>
                            <td>{{ $sede->provincia }}</td>
                            <td>{{ $sede->telefono }}</td>
                            <td>{{ $sede->correo }}</td>
                            <td><a href="{{route("eliminarSede", $sede->idSede)}}">Eliminar</a></td>
                            <td><a href="{{route("editarSede", $sede->idSede)}}">Editar</a></td>
                            <td><input type="checkbox" class="marcado" value="{{ $sede->idSede}}"></td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        @endif

        <script src="{{ asset('js/funcionalidades.js') }}"></script>


    @if (session("info"))
    <p>{{session("info")}} </p>
    @endif
    @endsection