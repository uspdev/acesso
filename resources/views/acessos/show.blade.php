@extends('main')

@section('content')
    <h4>Acesso</h4>
    <div class="card">
        <div class="card-header h4"><b>{{ $acesso->codpes }} | {{ $acesso->nome }}</b></div>
        <div class="card-body">
            <div class="row">
                {{-- Coluna da esquerda --}}
                <div class="col-md-6">
                    <div class="font-weight-bold"> Prédio </div>
                    <ul class="list-group">
                        <li class='list-group-item'>{{ \App\Models\Predio::find($acesso->predio_id)->nome }}</li>
                    </ul>
                    <br />
                    <div class="font-weight-bold"> Data e hora </div>
                    <ul class="list-group">
                        <li class='list-group-item'>{{ $acesso->created_at->format('d/m/Y H:i:s') }}</li>
                    </ul>
                    <br />
                    @php
                        if (in_array($acesso->vacina, config('acesso.statusCovid19verde'))) {
                            $status = 'success';
                        } elseif (in_array($acesso->vacina, config('acesso.statusCovid19amarelo'))) {
                            $status = 'warning';
                        } else {
                            $status = 'danger';
                        }
                    @endphp
                    <div class="font-weight-bold"> Vacina </div>
                    <ul class="list-group">
                        <li class='list-group-item'>
                            <span class="text-{{ $status }}"> <i class="fas fa-circle"></i></span>
                            <span>{{ $acesso->vacina }}</span>
                        </li>
                    </ul>
                    <br />
                    <div class="font-weight-bold"> Vínculos </div>
                    <ul class="list-group">
                        <li class='list-group-item'>
                            @forelse ($crachas as $cracha)
                                {{ $cracha['nomvin'] }} - {{ $cracha['nomorg'] }}<br />
                            @empty
                                Vínculo não encontrado
                            @endforelse
                        </li>
                    </ul>
                </div>
                {{-- Coluna da direita --}}
                <div class="col-md-6">
                    <div class="float-left ml-2">
                        <div class="font-weight-bold">Foto USP</div>
                        <img src="data:image/png;base64, {{ $foto }}" alt="foto">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection