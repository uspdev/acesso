<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('admin');

        $usuarios = User::where('codpes',NULL)->get();

        return view('usuarios.index', [
            'usuarios' => $usuarios
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('admin');

        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $usuarios = User::all();

        $request->session()->flash('alert-success', "Usuário salvo com sucesso!");

        return view('usuarios.index', [
            'usuarios' => $usuarios
        ]);
    }
}
