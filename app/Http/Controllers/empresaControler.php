<?php

namespace App\Http\Controllers;

use App\Http\Requests\dataEmpresaRequest;
use App\Http\Requests\representateEditarRequest;
use App\Http\Requests\representateRequest;
use App\Http\Requests\tutorEditarRequest;
use App\Http\Requests\tutorRequest;
use App\Http\Requests\updateEmpresaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\empresa;
use Illuminate\Support\Facades\DB;

class empresaControler extends Controller
{
    public function mainEmpresa()
    {
        if (!auth()->user()->email_verified) {
            return redirect()->route("dataRegister")->with("info", "Completa el registro y espera a que lo validen");
        }
        // return view("empresa.main")
        return "main empresa";
    }
    public function dataRegister()
    {
        $id = Auth::id();
        $user = DB::table("empresas")->where("idUser", "=", $id)->get();

        // return $user;
        return view("empresa.formRegistro", compact("user","id"));
    }

    public function dataRegisterPost(dataEmpresaRequest $request)
    {
        //crear un campo en la tabla empresa par guardar el id de la tabla de user y
        //asi poder relacionarla
        $idUser = Auth::id();
        $user = DB::table("users")->where("id", "=", $idUser)->get();

        DB::table("empresas")->insert([
            "idUser" => $idUser,
            "cif" => $request->cif,
            "email" => $user[0]->email,
            "nombreComercial" => $request->nombre,
            "autorizado" => 0,
            "tipo" => $request->tipo,
            "web" => $request->web,
            "telefono" => $request->telefono,
            "actividad" => $request->actividad,
            "horario" => $request->horario,
            "observaciones" => $request->observaciones
        ]);



        return redirect()->route("dataRegister")->with("info", "Datos guardados");
    }
    public function UpdateDatosRegistro(updateEmpresaRequest $request)
    {
        $idUser = Auth::id();
        $empresa = DB::table("empresas")->where("idUser", "=", $idUser)->update([
            "tipo" => $request->tipo,
            "web" => $request->web,
            "telefono" => $request->telefono,
            "actividad" => $request->actividad,
            "horario" => $request->horario,
            "observaciones" => $request->observaciones,
            "nombreComercial" => $request->nombre
        ]);


        return redirect()->route("dataRegister")->with("info", "Datos guardados");
    }

    public function editarEmpresaEmpresa()
    {
        $id = Auth::id();
        $empresa = DB::table("empresas")->where("idUser", "=", $id)->get();
        $tutores = DB::table("tutoreslaborales")->get();
        $representantes = DB::table("representantes")->where("activo","=",1)->get();
        $sedes = DB::table("sedes")->get();
        // return $user;
        return view("empresa.editarEmpresa", compact("id","empresa","tutores", "representantes","sedes"));
    }

    public function crearTutor(){
        $id = Auth::id();
        return view("empresa.crearTutor", compact("id"));
    }

    public function crearTutorPost(tutorRequest $request){
        $id = Auth::id();
        $idEmpresa=DB::table('empresas')->where("idUser","=",$id)->get();
        print_r($idEmpresa);
        DB::table("tutoreslaborales")->insert([
            "idEmpresa" => $idEmpresa[0]->idEmpresa,
            "nombre" => $request->nombre,
            "nif" => $request->nif,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "cargo" => $request->cargo,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Datos guardados");
    }

    public function eliminarTutor($ids){
        $id = Auth::id();
        DB::table("tutoreslaborales")->where("idTutorLaboral","=",$ids)->delete();
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Tutor eliminado");
    }

    public function editarTutor($ids){
        $id = Auth::id();
        $tutor=DB::table("tutoreslaborales")->where("idTutorLaboral","=",$ids)->get();
        return view("empresa.editarTutor", compact("id","tutor"));
    }

    public function editarTutorPost(tutorEditarRequest $request, $ids){
        $id = Auth::id();
        DB::table('tutoreslaborales')->where("idTutorLaboral","=", $ids)->update([
            "nombre" => $request->nombre,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "cargo" => $request->cargo,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Tutor editado");

    }

    public function crearRepresentante(){
        $id = Auth::id();
        return view("empresa.crearRepresentante", compact("id"));
    }

    public function crearRepresentantePost(representateRequest $request){
        $id = Auth::id();
        $idEmpresa=DB::table('empresas')->where("idUser","=",$id)->get();
        print_r($idEmpresa);
        DB::table("representantes")->insert([
            "idEmpresa" => $idEmpresa[0]->idEmpresa,
            "nombre" => $request->nombre,
            "nif" => $request->nif,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "cargo" => $request->cargo,
            "activo"=> 1,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Datos guardados");
    }

    public function eliminarRepresentante($ids){
        $id = Auth::id();
        DB::table("representantes")->where("idRepresentante","=",$ids)->update([
            "activo"=>0,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Representante eliminado");
    }

    public function editarRepresentante($ids){
        $id = Auth::id();
        $representante=DB::table("representantes")->where("idRepresentante","=",$ids)->get();
        return view("empresa.editarRepresentante", compact("id","representante"));
    }

    public function editarRepresentantePost(representateEditarRequest $request, $ids){
        $id = Auth::id();
        DB::table('representante')->where("idRepresentante","=", $ids)->update([
            "nombre" => $request->nombre,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
            "cargo" => $request->cargo,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Representante editado");

    }

    public function crearSede(){
        $id = Auth::id();
        return view("empresa.crearSede", compact("id"));
    }

    public function crearSedePost(sedeRequest $request){
        $id = Auth::id();
        $idEmpresa=DB::table('empresas')->where("idUser","=",$id)->get();
        print_r($idEmpresa);
        DB::table("sedes")->insert([
            "idEmpresa" => $idEmpresa[0]->idEmpresa,
            "nombreSede" => $request->nombreSede,
            "direccion" => $request->direccion,
            "codPostal" => $request->codPostal,
            "localidad" => $request->localidad,
            "provincia" => $request->provincia,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Datos guardados");
    }

    public function eliminarSede($ids){
        $id = Auth::id();
        DB::table("sedes")->where("idSede","=",$ids)->update([
            "activo"=>0,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Sede eliminada");
    }

    public function editarSede($ids){
        $id = Auth::id();
        $sede=DB::table("sedes")->where("idSede","=",$ids)->get();
        return view("empresa.editarSede", compact("id","sede"));
    }

    public function editarSedePost(sedeEditarRequest $request, $ids){
        $id = Auth::id();
        DB::table('sedes')->where("idSede","=", $ids)->update([
            "nombreSede" => $request->nombreSede,
            "direccion" => $request->direccion,
            "codPostal" => $request->codPostal,
            "localidad" => $request->localidad,
            "provincia" => $request->provincia,
            "telefono" => $request->telefono,
            "correo" => $request->correo,
        ]);
        return redirect()->route("editarEmpresaEmpresa", $id)->with("info", "Sede editada");

    }
}
