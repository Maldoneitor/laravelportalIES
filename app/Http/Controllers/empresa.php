<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateEmpresaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class empresa extends Controller
{
    public function mainEmpresa()
    {
        if (!auth()->user()->email_verified) {
            return redirect()->route("dataRegister")->with("info", "Debes de completar el registro");
        }
        $id=Auth::id();
        $empresa = DB::table('empresas')->where('idUser', $id)->get();
        return view("empresa.main", compact("id","empresa"));
    }

    public function verEmpresa($id)
    {
        $empresa = DB::table('empresas')->where('idUser', $id)->get();
        return view('empresa.verEmpresa', compact('empresa'));
    }
    public function editarEmpresa($id)
    {
        $empresa = DB::table('empresas')->where('idUser', $id)->get();
        return view('empresa.editarEmpresa', compact('empresa'));
    }
    public function editarEmpresaPost(updateEmpresaRequest $request){
        $idUser = Auth::id();
        DB::table("empresas")->where("idUser", "=", $idUser)->update([
            "tipo" => $request->tipo,
            "web" => $request->web,
            "telefono" => $request->telefono,
            "actividad" => $request->actividad,
            "horario" => $request->horario,
            "observaciones" => $request->observaciones,
            "nombreComercial" => $request->nombre
        ]);
        $empresa = DB::table('empresas')->where('idUser', $idUser)->get();
        return view("empresa.verEmpresa", compact("empresa"));
    }
}
