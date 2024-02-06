<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBypassMinRequest extends FormRequest
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
            'ticket' => 'required|string|min:10|max:10',
            'inicio' => 'required|date',
            'fin' => 'required|date',
            'codarea' => 'required|string',
            'min' => 'required|numeric',
            'observaciones' => 'required|string|max:250',
            'tcliente' => 'required|string|min:7|max:8',
        ];
    }

    public function messages()
    {
        return [
            'ticket.required' => 'El campo ticket es obligatorio.',
            'ticket.string' => 'El campo ticket debe ser una cadena.',
            'ticket.min' => 'El campo ticket debe tener mínimo 10 caracteres.',
            'ticket.max' => 'El campo ticket no debe exceder los 10 caracteres.',
            'codarea.required' => 'El campo código es obligatorio.',
            'codarea.string' => 'El campo código debe ser una cadena.',
            'min.required' => 'El campo celular es obligatorio.',
            'min.numeric' => 'El campo celular debe ser un número.',
            'inicio.required' => 'El campo fecha es obligatorio.',
            'inicio.date' => 'Por favor, ingrese una fecha válida.',
            'fin.required' => 'El campo fecha es obligatorio.',
            'fin.date' => 'Por favor, ingrese una fecha válida.',
            'tcliente.required' => 'El tipo de cliente es obligatorio.',
            'tcliente.string' => 'El tipo de cliente debe ser una cadena.',
            'tcliente.min' => 'El tipo de cliente debe tener mínimo 7 caracteres.',
            'tcliente.max' => 'El tipo de cliente no debe exceder los 8 caracteres.',
            'observaciones.required' => 'El campo observaciones es obligatorio.',
            'observaciones.string' => 'El campo observaciones debe ser una cadena.',
            'observaciones.max' => 'El campo observaciones no debe exceder los 250 caracteres.',
        ];
    }
}
