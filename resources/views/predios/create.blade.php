@extends('main')

@section('content')
    <h4>Novo prédio</h4>
    <form method="POST" action="/predios">
        @csrf
        Nome do prédio: <input type="text" id="nome" name="nome">
        <button type="submit" class="btn btn-success"> Enviar </button>
    </form>
@endsection
