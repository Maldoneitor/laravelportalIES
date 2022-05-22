@extends("empresa.plantilla")
@section('titulo')
solicitud practicas
@endsection
@section('contenido')
<div class="col m3">
<div class="row">
    <div class="col m3"></div>
    <h3>Formulario de petición de practicas</h3>
    <div class="col m3"></div>
    <form class="col s12 m6" action="{{route("solicitudPracticas")}}" method="post">

            @csrf
            <div class="divider"></div>
            <div class="input-field">
                <input name="alumnos" value="{{old("numero")}}" class="validate">
                <label for="alumnos">Número de alumnos</label>
            </div>
            @error('alumnos')
            <p>{{$message}}</p>
            @enderror
            <div class="divider"></div>
            <div>
                <h5>Horario</h5>
                <label>
                    <input type="checkbox" checked="checked" name="mañana"/>
                    <span>Mañana</span>
                </label>
                @error('mañana')
                <p>{{$message}}</p>
                @enderror
                <label>
                    <input type="checkbox" name="tarde"/>
                    <span>Tarde</span>
                </label>
                @error('tarde')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="divider"></div>
            <div>  
                <h5>Periodo</h5>
                <label>
                    <input type="checkbox" checked="checked" name="marzo"/>
                    <span>Marzo</span>
                </label>
                @error('marzo')
                <p>{{$message}}</p>
                @enderror
                <label>
                    <input type="checkbox" name="septiembre"/>
                    <span>Septiembre</span>
                </label>
                @error('septiembre')
                <p>{{$message}}</p>
                @enderror
                <label>
                    <input type="checkbox" name="otros"/>
                    <span>Otros</span>
                </label>
                @error('otros')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="divider"></div>
            <div>
                <h5>Selecciona un tutor</h5>
                @if (count($tutores)==0)
                    <h6>Debe añadir un tutor antes de realizar la petición de practicas, vaya a modificar datos de empresa</h6>
                @else
                <div class="input-field">
                    <select class="tutor" name="tutor">
                        <option value="" disabled selected>Elige una opción</option>
                        @foreach ($tutores as $tutor)
                        <option value="{{$tutor->idTutorLaboral}}">{{$tutor->nombre}}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('tutor')
                  <p>{{$message}}</p>
                  @enderror
                @endif
            </div>
            <div class="divider"></div>
            <div>
                <h5>Selecciona sede</h5>
                @if (count($sedes)==0)
                    <h6>Debe añadir una sede antes de realizar la petición de practicas, vaya a modificar datos de empresa</h6>
                @else
                <select placeholder="Selecciona una sede" class="sede" name="sede">
                    @foreach ($sedes as $sede)
                        <option value="{{$sede->idSede}}">{{$sede->nombreSede}}</option>
                    @endforeach
                </select>
                @endif
                @error('sede')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="row">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">Observaciones</i>
                      <textarea id="icon_prefix2" class="materialize-textarea" name="observaciones"></textarea>
                      <label for="icon_prefix2">Observaciones</label>
                    </div>
                  </div>
                  @error('observaciones')
                  <p>{{$message}}</p>
                  @enderror
              </div>
            </div>
            <button type="submit">Solicitar practicas</button>
        </div>
        <input type="text" name="idCiclo" hidden value="{{$dataCiclo[0]->idCicloCurso}}"/>
        <input type="text" name="idEmpresa" hidden value="{{$idEmpresa}}"/>
        @error('idCiclo')
        <p>{{$message}}</p>
        @enderror
        @error('idEmpresa')
        <p>{{$message}}</p>
        @enderror
    </form>
    <div class="col s3"></div>

</div>
@endsection