@extends('main')

@section('content')
    <h4>Usuários</h4>
    <button onclick="location.href = 'usuarios/create';" type="button" class="btn btn-success mb-2"> Novo </button>
    <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->role }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection