<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetController extends Controller {
    public function index() {
        return view('auth.password.reset');
    }

    public function update(Request $request) {

        return $request;
        
        $campos = [
            'clave' => 'required|min:8',
            'nueva-clave' => 'required|min:8',
            'password-confirm' => 'required|min:8',
        ];

        $this->validate($request,$campos);

        
    }
}
