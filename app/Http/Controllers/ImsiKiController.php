<?php

namespace App\Http\Controllers;


use App\Models\ImsiKi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
//use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
//use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

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
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        dd($imsiKi)->delete();

        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

    public function individual(Request $request)
    {
        
        $imsis_kis = ImsiKi::all(); // Replace with your data fetching logic
        return view('invisibles_ki.individual', compact('imsis_kis'));
      
    }


    public function masivo(Request $request)
    {
        return view('invisibles_ki.masivo');
    }

    public function getData()
    {
    
        {
            
            $data = ImsiKi::select('id', 'fecha', 'imsi', 'observaciones', 'ticket');

            return DataTables::of($data)
            ->make(true);
    

        }
    }
}
