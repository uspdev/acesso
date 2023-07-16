@extends('main')

@section('content')
    <h4>Prédios</h4>
    <button onclick="location.href = 'predios/create';" type="button" class="btn btn-success mb-2"> Novo </button>
    <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Prédio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($predios as $predio)
            <tr>
                <td><a href="acessos/create/{{ $predio->id }}">{{ $predio->nome }}</a></td>

                <td><button onclick="location.href = 'predios/{{ $predio->id }}/edit';" type="button" class="btn btn-success mb-2" name="Editar"> Editar </button>
                <form method="POST" action="/predios/{{$predio->id}}">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="btn btn-success mb-2" name="Delete"> Delete</button>
                    
                </form></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection


