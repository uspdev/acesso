@extends('main')

@section('content')
    <h4>Vigias</h4>
    <button onclick="location.href = 'usuarios/create';" type="button" class="btn btn-success mb-2"> Novo </button>
    <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td><a class="btn btn-success btn-sm" href="usuarios/{{ $usuario->id }}/edit" role="button">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection