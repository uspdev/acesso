@extends('main')

@section('content')
    <h4>Novo prédio</h4>
    <form method="POST" action="/predios">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do prédio </label>
            <input class="form-control w-50" type="text" id="nome" name="nome">
            <button type="submit" class="btn btn-success mt-2"> Enviar </button>
        <div class="form-group">
    </form>
@endsection
