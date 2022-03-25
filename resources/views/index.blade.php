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
        <div class="row">
            <div class="col-sm">
                <a href="login/vigia" class="btn btn-success">
                    <i class="fa fa-user-shield" aria-hidden="true"></i>
                  Vigia
                </a>
            </div>
            <div class="col-sm">
                <a href="login" class="btn btn-success">
                  <i class="fa fa-university" aria-hidden="true"></i>
                  Senha única USP
                </a>
            </div>
        </div>
    @endauth
@endsection




