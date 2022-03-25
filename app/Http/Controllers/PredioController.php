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

    public function create()
    {
        $this->authorize('admin');

        return view('predios.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

        $request->validate([
            'nome' => 'required',
        ]);

        $predio = new Predio;
        $predio->nome = $request->nome;
        $predio->save();

        $request->session()->flash('alert-success', "Prédio cadastrado com sucesso!");

        return redirect('predios');
    }
}
