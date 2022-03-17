@extends('main')

@section('content')
    <h4>Acessos</h4>
    <table class="table table-sm table-striped table-hover datatable"> {{-- // TODO Melhorar com filtros, ordenação e mostrar itens de paginação --}}
        <thead>
            <tr>
                <th>Nº USP</th>
                <th>Nome</th>
                <th>Vacina</th>
                <th>Acesso</th>
                <th>Prédio</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($acessos as $acesso)
            <tr>
                <td>{{ $acesso->codpes }}</td>
                <td>{{ $acesso->nome }}</td>
                @php
                    if (in_array($acesso->vacina, config('acesso.statusCovid19verde'))) {
                        $status = 'success';
                    } elseif (in_array($acesso->vacina, config('acesso.statusCovid19amarelo'))) {
                        $status = 'warning';
                    } else {
                        $status = 'danger';
                    }
                @endphp
                <td>
                    <span class="text-{{ $status }}"> <i class="fas fa-circle"></i></span>
                    <span>{{ $acesso->vacina }}</span>
                </td>
                <td>{{ $acesso->created_at->format('d/m/Y H:i:s') }}</td>
                <td>{{ \App\Models\Predio::find($acesso->predio)->nome }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection