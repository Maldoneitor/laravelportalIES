@extends('admin.plantilla')
@section('titulo')
    Administración
@endsection
@section('contenido')

        <h1>Página del Administrador</h1>
        <a href="{{ route('crearEmpresa') }}">Añadir empresa</a>
        <br>
        <br>
        {{-- FILTROS PARA LA TABLA --}}
        <br>
        <form action="{{ route('filtrar') }}" method="POST">
            @csrf
            <select name="filtro" id="filtro">
                {{-- Aquí hay que generar options según filtro --}}
                <option value="filtro1">Empresas no autorizadas</option>
                <option value="filtro2">Empresas en Granada</option>
                <option value="filtro3">Ver todo</option>
            </select>
            <button type="submit">FILTRAR</button>
        </form>
        {{-- Se ponen todos los filtros que el cliente quiera (o pueda) --}}
        {{-- TABLA DE EMPRESAS --}}
        <table>
            <tbody>
                <tr>
                    <td>Nombre</td>
                    <td>Teléfono</td>
                    <td>Email</td>
                    <td>Web</td>
                    <td>Actividad</td>
                    <td>Horario</td>
                    <td>Autorizado</td>
                    <td colspan="2">Acciones</td>
                    <td>Todos<input type="checkbox" id="todos"></td>
                </tr>

                {{-- Esto hay que generarlo dinámicamente --}}
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->nombreComercial }}</td>
                        <td>{{ $empresa->telefono }}</td>
                        <td>{{ $empresa->email }}</td>
                        <td>{{ $empresa->web }}</td>
                        <td>{{ $empresa->actividad }}</td>
                        <td>{{ $empresa->horario }}</td>
                        <td>
                            @if ($empresa->autorizado)
                                si
                            @else
                                no
                            @endif
                        </td>
                        <td><a href="{{ route('verEmpresa', $empresa->idEmpresa) }}">Ver</a></td>
                        <td><a href="{{ route('editarEmpresa', $empresa->idEmpresa) }}">Editar</a></td>
                        <td><input type="checkbox" class="marcado" value="{{ $empresa->idEmpresa }}"></td>
                @endforeach
                </tr>
            </tbody>
        </table>
        {{-- BOTONERÍA --}}
        <button id="btn-autorizar" class="{{ route('autorizarEmpresa', 1) }}">Autorizar</button>
        <button id="btn-correo" class="{{ route('correoEmpresa', 1) }}">Correo</button>
        <button id="btn-eliminar" class="{{ route('eliminarEmpresa', 1) }}">Eliminar</button>
        <!--De esta forma conseguimos paginar nuestra web-->
        {{ $empresas->links() }}
        <script src="{{ asset('js/funcionalidades.js') }}"></script>
    @if (session('info'))
        <p>{{ session('info') }} </p>
    @endif
@endsection
