<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predio;
use App\Http\Requests\PredioRequest;

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

    public function store(PredioRequest $request)
    {
        $this->authorize('admin');

        Predio::create($request->validated());

        return redirect('predios')->with('alert-success', "Prédio cadastrado com sucesso!");
    }

    public function edit(Predio $predio, Request $request)
    {
        $this->authorize('admin');

        return view('predios.edit', [
            'predio' => $predio
        ]);
    }

    public function update(PredioRequest $request, Predio $predio)
    {
        $this->authorize('admin');

        $predio->update($request->validated());

        return view('predios.index', [
            'predios' => Predio::all(),
        ]);
    }

    public function destroy(Predio $predio){
        $this->authorize('admin');
        if ($predio->acessos->isNotEmpty()){
            return redirect('/predios')->with('alert-danger', 'Existem registros de acessos deste prédio!');
        }
        $predio->delete();
        return  redirect('/predios');
    }
}
