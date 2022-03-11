<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Acesso;

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

        $acesso = new Acesso;
        $acesso->codpes = $request->codpes;
        $acesso->save();

        return redirect('acessos/create');
    }

}
