@extends('main')

@section('content')
    <table class="table table-sm table-striped table-hover datatable">
        <thead>
            <tr>
                <th>Prédio</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($predios as $predio)
            <tr>
                <td>{{ $predio->nome }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection