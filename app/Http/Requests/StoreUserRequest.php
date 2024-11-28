<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|regex:/^[a-zA-Z-áéíóóú\s]+$/|max:40',
            'usuario' => 'required|unique:users|numeric|regex:/^\d{7,8}$/',
            'perfil' => 'required|string|min:2|max:3',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre debe contener solo letras y espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 20 caracteres.',
            'usuario.required' => 'El campo cedula es obligatorio.',
            'usuario.unique' => 'Esta cedula ya se encuentra registrada',
            'usuario.numeric' => 'El campo cedula debe ser un número.',
            'usuario.digits' => 'El campo cedula debe tener mínimo 8 caracteres',
            'usuario.regex' => 'Ingrese un numero de cedula valido',
            'perfil.required' => 'El campo perfil es obligatorio.',
            'perfil.string' => 'El campo nombre debe ser una cadena.',
            'perfil.min' => 'El campo perfil debe tener mínimo 2 caracteres.',
            'perfil.max' => 'El campo perfil debe tener maximo 3 caracteres.',       
        ];
    }
}
