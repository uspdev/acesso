@extends('main')

@section('content')
    <table class="table table-sm table-striped table-hover"> {{-- // TODO Melhorar com filtros, ordenação e mostrar itens de paginação --}}
        <thead>
            <tr>
                <th>Prédio</th>
                <th>Acesso</th>
                <th>Nº USP</th>
                <th>Nome</th>
                <th>Vacina</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($acessos as $acesso)
            <tr>
                <td>{{ $acesso->predio }}</td>
                <td>{{ $acesso->created_at->format('d/m/Y H:i:s') }}</td>
                <td>{{ $acesso->codpes }}</td>
                <td>{{ $acesso->nome }}</td>
                <td>{{ $acesso->vacina }}</td> {{-- // TODO Destacar com cores os status como um semáforo (sugestão) --}}
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection