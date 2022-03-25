@extends('main')

@section('content')
    @auth
        <h4>Escolha um prédio</h4>

        <form>
            @csrf
            <div class="form-group">
                <label for="predio">Prédio </label>
                <select class="form-control w-50" id="predio">
                    @forelse ($predios as $predio)
                        <option onclick="location.href = 'acessos/create/{{ $predio->id }}';">{{ $predio->nome }}</option>
                    @empty
                        <option>Nenhum prédio cadastrado</option>
                    @endforelse
                </select>
              </div>
        </form>
    @else
        Você ainda não fez seu login com a senha única USP <a href="login"> Faça seu Login! </a>
    @endauth
@endsection




