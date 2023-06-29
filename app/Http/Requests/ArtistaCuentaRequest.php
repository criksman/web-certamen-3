<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistaCuentaRequest extends FormRequest
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
            'nombre' => 'bail|required|min:1|max:20',
            'apellido' => 'bail|required|min:1|max:20',
        ];
    }
}
