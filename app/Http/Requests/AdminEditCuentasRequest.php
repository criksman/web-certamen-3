<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminEditCuentasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required|min:1|max:20|unique:cuentas,user', //Tengo que hacer de alguna forma poder chequear si es unico, pero si no ha cambiado el nombre de usuario que ignore el que tiene porque si no me va a decir que ya existe (el suyo mismo))
            'nombre' => 'bail|required|min:1|max:20|alpha',
            'apellido' => 'bail|required|min:1|max:20|alpha',
            'perfil_id' => 'bail|required|integer|exists:perfiles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'user.required' => 'Indique el Usuario',
            'user.min' => 'Usuario no valido',
            'user.max' => 'Usuario no valido',
            'user.unique' => 'Usuario ya existe en el sistema',
            'nombre.required' => 'Indiquie el Nombre',
            'nombre.min' => 'Nombre no valido',
            'nombre.max' => 'Nombre no valido',
            'nombre.alpha' => 'El Nombre no debe tener numeros',
            'apellido.required' => 'Indique el apellido',
            'apellido.min' => 'Apellido no valido',
            'apellido.max' => 'Apellido no valido',
            'apellido.alpha' => 'El Apellido no debe tener numeros'
        ];
    }
}
