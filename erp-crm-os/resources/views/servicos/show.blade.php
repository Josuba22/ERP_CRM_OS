@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Serviço</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $servico->nome }}</h5>
                <p class="card-text"><strong>Descrição:</strong> {{ $servico->descricao }}</p>
                <p class="card-text"><strong>Preço:</strong> {{ $servico->formatted_preco }}</p>
            </div>
        </div>

        <a href="{{ route('servicos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection