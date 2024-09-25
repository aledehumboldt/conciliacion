<?php

namespace App\Http\Controllers;


use App\Models\ImsiKi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ImsiKiController extends Controller
{
    protected function verify() {
        if (Auth::user()->perfil == "CYA"
        && Auth::user()->estatus != "Iniciado") {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->verify()) {
            return back();
        }
        
        if (Auth::user()->perfil == "SA") {
            return $this->create();
        }

        return view('invisibles_ki.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('invisibles_ki.masivo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return view('invisibles_ki.individual');
    }

    /**
     * Display the specified resource.
     */
    public function show(ImsiKi $imsiKi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImsiKi $imsiKi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImsiKi $imsiKi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImsiKi $imsiKi)
    {
        //
    }
}
