@extends('main')

@section('content')
    <h4>Prédios</h4>
    <button onclick="location.href = 'predios/create';" type="button" class="btn btn-success mb-2"> Novo </button>
    <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Prédio</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($predios as $predio)
            <tr>
                <td><a href="acessos/create/{{ $predio->id }}">{{ $predio->nome }}</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection