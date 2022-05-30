@extends('main')

@section('content')
    @auth
        <h4>Escolha um prédio</h4>
        <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Prédios</th>
            </tr>
        </thead>
        <form>
            @csrf
            <div class="form-group">
                <label for="predio"> </label>
                @foreach ($predios as $predio)
                <tr>
                    <td><a href="acessos/create/{{ $predio->id }}" name ="predio-nome">{{ $predio->nome }}</a></td>
                </tr>
        @endforeach
              </div>
        </form>
        </table>
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




