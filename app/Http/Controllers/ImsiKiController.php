<?php

namespace App\Http\Controllers;


use App\Models\ImsiKi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
//use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;
use App\Rules\ValidateIMSI;

class ImsiKiController extends Controller
{
    protected function verify() {
        if (Auth::user()->perfil == "Conciliacion"
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
        
        if (Auth::user()->perfil == "SASM") {
            return $this->create();
        }

        return view('invisibles_ki.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invisibles_ki.create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ticket' => 'required|integer|between:3900000000,3900999999',
            'fecha' => 'required|date',
            'imsi' => ['required', new ValidateIMSI, Rule::unique('imsi_kis')->ignore($request->id)],
            'observaciones' => 'nullable|string|max:500',
        ]);
    
        try {
            ImsiKi::create($validatedData);
            return redirect()->route('invisibles_ki.individual')->with('success', 'Datos guardados correctamente');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.'])->withInput();
        }
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
    public function edit($id)
    {
        $imsis_ki = ImsiKi::findOrFail($id);

        return view('invisibles_ki.individual', compact('imsis_ki'));
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
    public function destroy($id)
    {
        ImsiKi::findOrFail($id)->delete();
        return redirect()->route('invisibles_ki.individual')->with('success', 'Registro eliminado correctamente');
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
