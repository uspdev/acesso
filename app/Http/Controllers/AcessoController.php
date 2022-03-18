<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Acesso;
use App\Models\Predio;

use Uspdev\Replicado\Pessoa;
use Uspdev\Wsfoto;

class AcessoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('admin');

        // TODO Seria a melhor ordenação padrão?
        $acessos = Acesso::orderBy('predio', 'asc')
            ->orderBy('created_at', 'desc')
            ->orderBy('nome', 'asc')
            ->paginate(100);

        return view('acessos.index', [
            'acessos' => $acessos
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('admin');

        $arrUrl = explode('/', str_replace(url('/'), '', url()->current()));
        $predio = Predio::find(end($arrUrl));

        return view('acessos.create', [
            'predio' => $predio
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

        $request->validate([
            'codpes' => 'required',
        ]);
        $arrUrl = explode('/', str_replace(url('/'), '', url()->previous()));
        $predio = end($arrUrl);

        $pessoa = Pessoa::dump($request->codpes);
        if ($pessoa) {
            $acesso = new Acesso;
            $acesso->codpes = $request->codpes;
            $acesso->predio = Predio::find($predio)->id;
            $acesso->nome = $pessoa['nompes'];
            $acesso->vacina = Pessoa::obterSituacaoVacinaCovid19($request->codpes);
            $acesso->save();
            if (in_array($acesso->vacina, config('acesso.statusCovid19verde'))) {
                $status = 'success';
            } elseif (in_array($acesso->vacina, config('acesso.statusCovid19amarelo'))) {
                $status = 'warning';
            } else {
                $status = 'danger';
            }
            $request->session()->flash('alert-success', "Acesso registrado com sucesso!");
        } else {
            $request->session()->flash('alert-danger', 'Pessoa não encontrada nos sistemas USP!');
        }
        $rota = (config('acesso.rotaAposRegistroAcesso') == 'create') ? "acessos/create/{$acesso->predio}" : "acessos/{$acesso->id}";

        return redirect($rota);
    }

    public function show(Request $request, $acesso)
    {
        $this->authorize('admin');

        $acesso = Acesso::find($acesso);
        $foto = \Uspdev\Wsfoto::obter($acesso->codpes);

        return view('acessos.show', compact('acesso', 'foto'));
    }

}
