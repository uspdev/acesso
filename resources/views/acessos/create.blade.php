@extends('main')

@section('content')
    <h4>Novo acesso</h4>
    <form method="POST" action="/acessos">
        @csrf
        <div class="form-group">
          <label for="codpes">Nº USP </label>
          <input class="form-control w-25" type="text" id="codpes" name="codpes">
          <button type="submit" class="btn btn-success mt-2"> Enviar </button>
        </div>
    </form>
@endsection

@section('javascripts_bottom')
  @parent
  <script type="text/javascript">
    $("#codpes").focus();
  </script>
@endsection
