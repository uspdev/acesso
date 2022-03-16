<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Acesso;

use Uspdev\Replicado\Pessoa;

class AcessoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('admin');

	    $acessos =  Acesso::paginate(30);

        return view('acessos.index',[
            'acessos' => $acessos
        ]);
    }

    public function create()
    {
        return view('acessos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codpes' => 'required|integer',
        ]);

        $pessoa = Pessoa::dump($request->codpes);
        if ($pessoa) {
            $acesso = new Acesso;
            $acesso->codpes = $request->codpes;
            # $acesso->predio = ''; // TODO Quando tiver a model prédio pegar o prédio correto
            $acesso->nome = $pessoa['nompes'];
            $acesso->vacina = Pessoa::obterSituacaoVacinaCovid19($request->codpes);
            $acesso->save();
            $request->session()->flash('alert-success', 'Acesso registrado com sucesso!');
        } else {
            $request->session()->flash('alert-danger', 'Pessoa não encontrada nos sistemas USP!');
        }

        return redirect('acessos/create');
    }

}
