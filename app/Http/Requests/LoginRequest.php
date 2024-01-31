<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'usuario' => 'required',
            'clave' => 'required'
        ];
    }

    public function getCredentials(){
        $username = $this->get('usuario');

        if($this->isEmail($username)){
            return [
                'email' => $username,
                'clave' => $this->get('clave')
            ];
        }
        return $this->only('usuario','clave');
    }

    public function isEmail($value) {
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['usuario' => $value], ['usuario' => 'email'])->fails();
    }
}
