<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BypasMin;

class bypasController extends Controller
{
        protected function verify() {
        if (Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if(!$this->verify()) {
            return back();
        }

        if(auth()->user()->perfil == "SA") {
            return redirect()->route('home');
        }

        return view('bypass.index');
    }

    public function show(Request $request)
    {
        return view('bypass.bypassMin.index', $request);
    }

}
