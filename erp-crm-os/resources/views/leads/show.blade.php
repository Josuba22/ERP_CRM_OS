@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Lead</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $lead->nome }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $lead->email }}</p>
                <p class="card-text"><strong>Telefone:</strong> {{ $lead->fone }}</p>
                <p class="card-text"><strong>Origem:</strong> {{ $lead->origem }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $lead->status }}</p>
            </div>
        </div>

        <a href="{{ route('leads.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection