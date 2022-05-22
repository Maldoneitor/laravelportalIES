<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class practicasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "alumnos" => "required | numeric | max:20 | min:1",
            "mañana" => "required_without:tarde",
            "tarde" => "required_without:mañana",
            "marzo" => "required_without_all:septiembre,otros",
            "septiembre" => "required_without_all:marzo,otros",
            "otros" => "required_without_all:marzo,septiembre",
            "tutor" => "required | exists:tutoreslaborales,idTutorLaboral",
            "sede" => "required | exists:sedes,idSede",
            "observaciones" => "nullable |  max:200 | min:2",
            "idCiclo" => "required | exists:ciclocursos,idCicloCurso",
            "idEmpresa" => "required | exists:empresas,idEmpresa",
        ];
    }
}
