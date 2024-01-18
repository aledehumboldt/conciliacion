<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBypasMinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'ticket' => 'required|string|min:10|max:10',
            'fecha' => 'required|date|after:today',
            'usuario' => 'required|string',
            'codarea' => 'required|string',
            'celular' => 'required|numeric',
            'observaciones' => 'required|string|max:250',
            'tcliente' => 'required|string|min:7|max:8',

        ];
    }
}
