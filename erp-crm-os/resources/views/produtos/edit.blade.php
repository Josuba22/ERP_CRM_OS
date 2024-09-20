@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $produto->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="{{ old('preco', $produto->preco) }}" required>
            </div>

            <div class="form-group">
                <label for="estoque">Estoque:</label>
                <input type="number" class="form-control" id="estoque" name="estoque" value="{{ old('estoque', $produto->estoque) }}" required>
            </div>

            <div class="form-group">
                <label for="min_estoque">Estoque Mínimo:</label>
                <input type="number" class="form-control" id="min_estoque" name="min_estoque" value="{{ old('min_estoque', $produto->min_estoque) }}" required>
            </div>

            <div class="form-group">
                <label for="max_estoque">Estoque Máximo:</label>
                <input type="number" class="form-control" id="max_estoque" name="max_estoque" value="{{ old('max_estoque', $produto->max_estoque) }}" required>
            </div>

            <div class="form-group">
                <label for="fornecedor_id">Fornecedor:</label>
                <select class="form-control" id="fornecedor_id" name="fornecedor_id" required>
                    <option value="">Selecione um fornecedor</option>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id', $produto->fornecedor_id) === $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->razao_social }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Produto</button>
        </form>
    </div>
@endsection