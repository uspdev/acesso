<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Predio;

class IndexController extends Controller
{
    public function index()
    {
        $predios = Predio::orderBy('nome', 'asc')->get();

        return view('index', [
            'predios' => $predios
        ]);
    }
}
