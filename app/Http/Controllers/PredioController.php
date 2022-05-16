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
    public function edit(Predio $predio, Request $request)
    {
        $this->authorize('admin');

        $predioId = explode('/', $request->getPathInfo())[2];

        $predio = Predio::find($predioId);

        return view('predios.edit', [
            'predio' => $predio
        ]);
    }
    public function update(Request $request, Predio $predio) 
    {
        $this->authorize('admin');

        $predioId = explode('/', $request->getPathInfo())[2];

        $predio = Predio::find($predioId); 

        $predio->nome = $request->nome;
        
        $predio->save();

        $predios = Predio::all(); 

        

        return view('predios.index', [
            'predios' => $predios
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
