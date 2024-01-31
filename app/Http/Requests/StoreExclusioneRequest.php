<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExclusioneRequest extends FormRequest
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
            'codarea' => 'required|string',
            'celular' => 'required|numeric',
            'fechae' => 'required|date|after:today',
            'tcliente' => 'required|string|min:7|max:8',
            'observaciones' => 'required|string|max:250',
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
            'celular.required' => 'El campo celular es obligatorio.',
            'celular.numeric' => 'El campo celular debe ser un número.',
            'fechae.required' => 'El campo fecha es obligatorio.',
            'fechae.date' => 'Por favor, ingrese una fecha válida.',
            'fechae.after' => 'La fecha debe ser distinta de hoy.',
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
