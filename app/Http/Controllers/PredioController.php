<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predio;

class PredioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('admin');

        $predios = Predio::all();

        return view('predios.index', [
            'predios' => $predios
        ]);
    }
}
