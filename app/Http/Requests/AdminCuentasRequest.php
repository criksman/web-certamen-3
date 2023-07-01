<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCuentasRequest extends FormRequest
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
            'user' => 'required|unique:cuentas,user|min:1|max:20',
            'password' => 'bail|required|min:8|max:30',
            'nombre' => 'bail|required|min:1|max:20|alpha',
            'apellido' => 'bail|required|min:1|max:20|alpha',
            'perfil_id' => 'bail|required|integer|exists:perfiles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'user.min' => 'Usuario no valido',
            'user.max' => 'Usuario no valido',
            'user.unique' => 'Usuario ya existe en el sistema',
            'user.required' => 'Indique el usuario',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
            'password.max' => 'La contraseña debe tener maximo 30 caracteres',
            'password.required' => 'Indique la contraseña',
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
