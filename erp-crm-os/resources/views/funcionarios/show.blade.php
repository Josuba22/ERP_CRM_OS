@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Funcionário</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $funcionario->nome }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $funcionario->email }}</p>
                <p class="card-text"><strong>Telefone:</strong> {{ $funcionario->fone }}</p>
                <p class="card-text"><strong>Cargo:</strong> {{ $funcionario->cargo }}</p>
                <p class="card-text"><strong>Taxa de Comissão:</strong> {{ $funcionario->taxa_comissao }}</p>
            </div>
        </div>

        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection