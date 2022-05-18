@extends('main')

@section('content')
    <h4>Prédio</strong></h4>
    <form method="POST" action="/predios/{{ $predio->id }}">
        @csrf
        {{ method_field('patch') }}
        
        <div class="form-group">
          <label for="nome">Nome do Prédio</label>
          <input class="form-control w-50" type="text" id="nome" name="nome" value="{{ old('nome', $predio->nome) }}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success mt-2"> Enviar </button>
        </div>
    </form>
@endsection