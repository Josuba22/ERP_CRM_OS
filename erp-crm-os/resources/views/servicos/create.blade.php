@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Novo Serviço</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('servicos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao') }}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="{{ old('preco') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Criar Serviço</button>
        </form>
    </div>
@endsection