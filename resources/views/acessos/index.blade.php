@extends('main')

@section('content')
    <h4>Acessos</h4>
    <table class="table table-sm table-striped table-hover datatable-acessos"> {{-- // TODO Melhorar com filtros, ordenação e mostrar itens de paginação --}}
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
                <td><a href="acessos/{{ $acesso->id }}">{{ $acesso->nome }}</a></td>
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

    {{-- Paginação --}}
    @include('acessos.partials.nav')

@endsection

@section('javascripts_bottom')
@parent
<script>
    $(document).ready(function() {
        // DataTables
        var table = $('.datatable-acessos').DataTable({
            dom: 'Bf<t>'
            , ordering: false
            , order: ['3', 'asc'] /* ordenando por acesso desc */
            , language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
            }
            , paging: true
            , lengthChange: true
            , searching: true
            , info: true
            , autoWidth: true
            , lengthMenu: [
                [10, 25, 50, 100, -1]
                , ['10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos']
            ]
            , pageLength: -1
            , buttons: [
                'excelHtml5'
                , 'csvHtml5'
            ]
        });
    });
</script>
@endsection

