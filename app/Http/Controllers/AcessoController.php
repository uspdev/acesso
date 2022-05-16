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

    public function index(Request $request)
    {
        $this->authorize('admin');

        // Registros por página
        $perPage = empty($request->perPage) ? config('acesso.registrosPorPagina') : $request->perPage;

        // TODO Seria a melhor ordenação padrão?
        $acessos = Acesso::orderBy('created_at', 'desc')->paginate($perPage);

        // Paginando
        $nav['total'] = $acessos->total();
        // pagina começa no 0 mas vamos mostrar começando no 1
        $nav['pagCor'] = $acessos->currentPage();
        $nav['perPag'] = $acessos->perPage();
        $nav['totPag'] = $acessos->lastPage();

        $maxLnk = 5; # Máximo de links
        $lnkLat = ceil($maxLnk / 2); # Cálculo dos links laterais
        $nav['pagIni'] = $nav['pagCor'] - $lnkLat; # Início dos links (esquerda)
        $nav['pagFin'] = $nav['pagCor'] + $lnkLat; # Fim dos links (direita)

        return view('acessos.index', [
            'acessos' => $acessos,
            'nav' => $nav
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('vigia');

        $arrUrl = explode('/', str_replace(url('/'), '', url()->current()));

        $predio = Predio::find(end($arrUrl));

        return view('acessos.create', [
            'predio' => $predio
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('vigia');

        $request->validate([
            'codpes' => 'required',
        ]);
        $arrUrl = explode('/', str_replace(url('/'), '', url()->previous()));
        $predio = end($arrUrl);

        $pessoa = Pessoa::dump($request->codpes);
        if ($pessoa) {
            $acesso = new Acesso;
            $acesso->codpes = $request->codpes;
            $acesso->predio_id = Predio::find($predio)->id;
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
            $rota = (config('acesso.rotaAposRegistroAcesso') == 'create') ? "acessos/create/{$acesso->predio}" : "acessos/{$acesso->id}";
            $request->session()->flash('alert-success', "Acesso registrado com sucesso!");
        } else {
            $rota = "acessos/create/{$predio}";
            $request->session()->flash('alert-danger', 'Pessoa não encontrada nos sistemas USP!');
        }

        return redirect($rota);
    }

    public function show(Request $request, $acesso)
    {
        $this->authorize('vigia');

        $acesso = Acesso::find($acesso);
        $foto = \Uspdev\Wsfoto::obter($acesso->codpes);
        $crachas = Pessoa::listarCrachas($acesso->codpes);

        return view('acessos.show', compact('acesso', 'foto', 'crachas'));
    }

}
