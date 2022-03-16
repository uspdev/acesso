@extends('main')

@section('content')
    <form method="POST" action="/acessos">
        @csrf
        Número USP: <input type="text" id="codpes" name="codpes">
        <button type="submit" class="btn btn-success"> Enviar </button>
    </form>
@endsection

@section('javascripts_bottom')
  @parent
  <script type="text/javascript">
    $("#codpes").focus();
  </script>
@endsection
