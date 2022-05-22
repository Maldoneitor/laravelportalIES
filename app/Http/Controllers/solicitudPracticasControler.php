<?php

namespace App\Http\Controllers;

use App\Http\Requests\practicasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class solicitudPracticasControler extends Controller
{
    public function peticionPracticas($ciclo, $idEmpresa){
        $id = Auth::id();
        $tutores=DB::table('tutoresLaborales')->where("idEmpresa","=",$id)->get();
        $sedes=DB::table('sedes')->where("idEmpresa","=",$id)->get();
        $dataCiclo=DB::table('ciclocursos')->where("nombre","=",$ciclo)->get();
        return view("solicitudes.solicitud", compact("dataCiclo","id","tutores","sedes","idEmpresa"));
    }

    public function solicitudPracticas (practicasRequest $request){
        $consulta=DB::table('solicitudes')->where("idSede","=",$request->sede)->get();
        if(count($consulta)>=1){
            return redirect()->route("mainEmpresa")->with("info", "La sede ya ha solicitado unas practicas");
        }
        $id = Auth::id();
        //$empresa=DB::table('empresas')->where("idEmpresa","=", $request->idEmpresa)->get();
        $tutor=DB::table('tutoreslaborales')->where("idTutorLaboral","=",$request->tutor)->get();
        $sede=DB::table('sedes')->where("idSede","=",$request->sede)->get();
        $ciclo=DB::table('ciclocursos')->where("idCicloCurso","=",$request->idCiclo)->get();
        $horario="";
        if($request->mañana){
            $horario.=" mañana ";
        }
        if($request->tarde){
            $horario.=" tarde ";
        }
        $periodo="";
        if($request->marzo){
            $periodo.=" marzo ";
        }
        if($request->septiembre){
            $periodo.=" septiembre ";
        }
        if($request->otros){
            $periodo.=" otros ";
        }
        //dump($request);
        DB::table("solicitudes")->insert([
            "idEmpresa" => $request->idEmpresa,
            "idTutorLaboral" => $request->tutor,
            "nif" => $tutor[0]->nif,
            "nombreTutor"=> $tutor[0]->nombre,
            "cargo"=> $tutor[0]->cargo,
            "correoTutor"=> $tutor[0]->correo,
            "telefonoTutor"=> $tutor[0]->telefono,
            "idSede"=> $request->sede,
            "nombreSede"=> $sede[0]->nombreSede,
            "direccion"=> $sede[0]->direccion,
            "codPostal"=> $sede[0]->codPostal,
            "localidad"=> $sede[0]->localidad,
            "provincia"=> $sede[0]->provincia,
            "correoSede"=> $sede[0]->correo,
            "telefonoSede"=> $sede[0]->telefono,
            "idCicloCurso"=> $request->idCiclo,
            "ciclo"=> $ciclo[0]->ciclo,
            "curso"=> $ciclo[0]->curso,
            "modalidad"=>"null",
            "fecha"=>date("j, n, Y"),
            "nombreCiclo"=> $ciclo[0]->nombre,
            "numAlumnos"=> $request->alumnos,
            "horario"=> $horario, 
            "periodo"=> $periodo,
            "observaciones"=> $request-> observaciones,
        ]);
        
        return redirect()->route("mainEmpresa", $id)->with("info", "Solicitud de practicas enviada");
    }
}
