<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeImmutable;
use App\Http\Requests\CrearEmprRequest;
use App\Mail\adminMail;
use Firebase\JWT\JWT;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    // create
    public function crearEmpresa()
    {

        return view("admin.crearEmpresa");
    }

    // create
    public function crearEmpresaPost(CrearEmprRequest $request)
    {
        //guardar bd la info
        // $request->session()->regenerateToken();
        User::create(["email" => $request->email, "password" => "yamil"]);
        $user = DB::table('users')->where("email", "=", $request->email)->get();

        $email = $request->email;
        $fecha = new  DateTimeImmutable();
        $key = env('JWT_SECRET');
        $expire = $fecha->modify(env("JWT_EXPIRE"))->getTimestamp();
        $data  = [
            "id" => $user[0]->id,
            'iat' => $fecha->getTimestamp(),
            'nbf' => $fecha->getTimestamp(),
            "exp" => $expire
        ];

        $jwt = JWT::encode($data, $key, 'HS256');

        //  Auth::create(['email' => $email, 'password' => $jwt]); //crear




        Mail::to($email)->send(new LoginMail($jwt));


        return redirect()->route("mainAdmin")->with("info", "usuario creado");
    }


    // filtro para poder entrar + index
    public function mainAdmin()
    {
        if (Auth::id() != 1) {
            return redirect()->route("mainEmpresa");
        }
        $empresas = DB::table('empresas')->simplePaginate(env("PAGES_PAGINATION"));

        return view('admin.main', compact('empresas'));
    }

    public function filtrar(Request $request)
    {
        // orden
        ($request->orden == "asc") ? $orden = "asc" : $orden = "desc";

        // autorizado
        ($request->autorizado == "si") ? $autorizado = 1 : $autorizado = 0;

        //dump($request,$orden, $autorizado);
        // si el campo nombre contiene algo, lo usamos para filtrar
        if (!empty($request->nombre)) {
            $empresas = DB::table('empresas')
                ->where('nombreComercial', '=', $request->nombre)
                ->orderBy('idEmpresa', $orden)
                ->simplePaginate(env("PAGES_PAGINATION"));
            return view('admin.main', compact('empresas'));
        } else {
            $empresas = DB::table('empresas')
                ->where('autorizado', '=', $autorizado)
                ->orderBy('idEmpresa', $orden)
                ->simplePaginate(env("PAGES_PAGINATION"));
            return view('admin.main', compact('empresas'));
        }
    }

    public function autorizarEmpresa($ids)
    {
        $arrayIds = explode(",", $ids);
        foreach ($arrayIds as $id) {
            DB::table('empresas')->where('idEmpresa', $id)->update(array('autorizado' => 1));
        }
        return redirect()->route('mainAdmin')->with('info', 'autorizada correctamente');
    }
    public function correoEmpresa($ids)
    {
        $arrayIds = explode(",", $ids);

        $arrayEmails = [];
        foreach ($arrayIds as $id) {
            $empresa = DB::table('empresas')->where('idEmpresa', $id)->get();
            array_push($arrayEmails, $empresa[0]->email);
        }

        return view("admin.correos", compact('arrayEmails'));
    }
    public function eliminarEmpresa($ids)
    {
        //dump($ids);
        $arrayIds = explode(",", $ids);

        foreach ($arrayIds as $id) {
            DB::table('empresas')->where('idEmpresa', $id)->delete();
        }
        return redirect()->route('mainAdmin')->with('info', 'eliminada correctamente');
    }
    public function enviarEmail(Request $request)
    {
        //no puedo seguir porque las visas no me dejan ver mas de un coreo

        $arrayEmails = explode(",", $request->email);
        foreach ($arrayEmails as $email) {
            Mail::to($email)->send(new adminMail($request->asunto, $request->cuerpo));
        }
        return redirect()->route('mainAdmin')->with('info', 'correo enviado');
    }
}
