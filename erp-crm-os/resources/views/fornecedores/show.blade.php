@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Fornecedor</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $fornecedor->razao_social }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $fornecedor->email }}</p>
                <p class="card-text"><strong>Telefone:</strong> {{ $fornecedor->fone }}</p>
                <p class="card-text"><strong>Endereço:</strong> {{ $fornecedor->endereco }}</p>
                <p class="card-text"><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
                <p class="card-text"><strong>Inscrição Estadual:</strong> {{ $fornecedor->inscricao_estadual }}</p>
                <p class="card-text"><strong>Observações:</strong> {{ $fornecedor->observacoes }}</p>
            </div>
        </div>

        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection