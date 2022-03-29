@extends('main')

@section('content')
    <h4>Vigia</strong></h4>
    <form method="POST" action="/usuarios/{{ $usuario->id }}">
        @csrf
        {{ method_field('patch') }}
        <div class="form-group">
          <label for="email">E-mail </label>
          <input class="form-control w-25" type="text" id="email" name="email" value="{{ old('name', $usuario->email) }}" disabled="disabled">
        </div>
        <div class="form-group">
          <label for="name">Nome </label>
          <input class="form-control w-50" type="text" id="name" name="name" value="{{ old('name', $usuario->name) }}">
        </div>
        <div class="form-group">
          <label for="password">Senha </label>
          <input class="form-control w-25" type="password" id="password" name="password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success mt-2"> Enviar </button>
        </div>
    </form>
@endsection