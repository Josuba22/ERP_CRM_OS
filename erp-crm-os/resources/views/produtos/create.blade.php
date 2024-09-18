@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Novo Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.store') }}" method="POST">
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

            <div class="form-group">
                <label for="estoque">Estoque:</label>
                <input type="number" class="form-control" id="estoque" name="estoque" value="{{ old('estoque') }}" required>
            </div>

            <div class="form-group">
                <label for="estoque_minimo">Estoque Mínimo:</label>
                <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" value="{{ old('estoque_minimo') }}" required>
            </div>

            <div class="form-group">
                <label for="estoque_maximo">Estoque Máximo:</label>
                <input type="number" class="form-control" id="estoque_maximo" name="estoque_maximo" value="{{ old('estoque_maximo') }}" required>
            </div>

            <div class="form-group">
                <label for="fornecedor_id">Fornecedor:</label>
                <select class="form-control" id="fornecedor_id" name="fornecedor_id" required>
                    <option value="">Selecione um fornecedor</option>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Criar Produto</button>
        </form>
    </div>
@endsection