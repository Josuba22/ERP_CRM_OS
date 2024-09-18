@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Produto</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                <p class="card-text"><strong>Preço:</strong> {{ $produto->formatted_preco }}</p>
                <p class="card-text"><strong>Estoque:</strong> {{ $produto->estoque }}</p>
                <p class="card-text"><strong>Estoque Mínimo:</strong> {{ $produto->estoque_minimo }}</p>
                <p class="card-text"><strong>Estoque Máximo:</strong> {{ $produto->estoque_maximo }}</p>
                <p class="card-text"><strong>Fornecedor:</strong> {{ $produto->fornecedor->nome }}</p>
            </div>
        </div>

        <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection