@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Cliente</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $cliente->nome }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $cliente->email }}</p>
                <p class="card-text"><strong>Telefone:</strong> {{ $cliente->fone }}</p>
                <p class="card-text"><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
            </div>
        </div>

        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection