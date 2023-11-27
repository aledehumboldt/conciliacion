<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AprovController extends Controller
{
    public function index() {
        return view('aprov.documents');
    }
}
