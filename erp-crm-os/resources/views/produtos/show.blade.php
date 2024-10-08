@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Produto</h1>

        <div class="card">
            <div class="card-body">
                @if($produto->foto)
                    <img src="{{ asset(Storage::url($produto->foto)) }}" alt="Foto do Produto" class="img-thumbnail" style="max-width: 300px;">
                @endif
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text"><strong>Categoria:</strong> {{ $produto->categoria }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                <p class="card-text"><strong>Preço:</strong> {{ $produto->formatted_preco }}</p>
                <p class="card-text"><strong>Estoque:</strong> {{ $produto->estoque }}</p>
                <p class="card-text"><strong>Estoque Mínimo:</strong> {{ $produto->min_estoque }}</p>
                <p class="card-text"><strong>Estoque Máximo:</strong> {{ $produto->max_estoque }}</p>
                <p class="card-text"><strong>Fornecedor:</strong> {{ $produto->fornecedor->razao_social }}</p>
            </div>
        </div>

        <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
