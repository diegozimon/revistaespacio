<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:60',
            'usermail' => 'required|max:60',
            'password' => 'required|max:255',
            'nombre' => 'required|max:60',
            'apellido' => 'required|max:60',
            'direccion' => 'required|max:255',
            'ciudad_id' => 'required',
            
        ];
    }
}
