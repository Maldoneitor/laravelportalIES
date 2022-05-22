<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sedeRequest extends FormRequest
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
            "nombreSede" => "required |  max:24 | min:2",
            "direccion" => "required | max:50 | min:5",
            "codPostal" => "required | digits:5| numeric",
            "localidad" => "required |  max:24 | min:2",
            "provincia" => "required |  max:24 | min:2",
            "telefono" => "required | digits:9| numeric ",
            "correo" => "required | email",
        ];
    }
}
