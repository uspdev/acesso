@extends('main')
@section('content')
<h4>Login Vigia</h4>
<form method="POST" action="/login/vigia">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
        <div class="col-md-6">
            <input type="password" name="password" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </div>
</form>
@endsection