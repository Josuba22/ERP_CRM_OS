@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Nova Venda</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="funcionario_id">Funcionário:</label>
                <select class="form-control" id="funcionario_id" name="funcionario_id" required>
                    <option value="">Selecione um funcionário</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>

            <h2>Itens da Venda</h2>

            <div id="itens-venda">
                <div class="item-venda">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="produto_id">Produto:</label>
                            <select class="form-control" name="itens[0][produto_id]" required>
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" class="form-control" name="itens[0][quantidade]" min="1" value="1" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" id="adicionar-item">Adicionar Item</button>

            <button type="submit" class="btn btn-primary mt-3">Registrar Venda</button>
        </form>
    </div>

    <script>
        let itemCount = 1;

        document.getElementById('adicionar-item').addEventListener('click', function() {
            const itensVenda = document.getElementById('itens-venda');
            const newItem = document.createElement('div');
            newItem.classList.add('item-venda', 'mt-2');
            newItem.innerHTML = `
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="produto_id">Produto:</label>
                        <select class="form-control" name="itens[${itemCount}][produto_id]" required>
                            <option value="">Selecione um produto</option>
                            @foreach($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" class="form-control" name="itens[${itemCount}][quantidade]" min="1" value="1" required>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remover-item">Remover</button>
                    </div>
                </div>
            `;
            itensVenda.appendChild(newItem);
            itemCount++;

            // Adiciona evento para remover item
            const removerItemButtons = document.querySelectorAll('.remover-item');
            removerItemButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.parentNode.parentNode.parentNode.remove();
                    itemCount--;
                });
            });
        });

        // Adiciona evento para remover item (itens iniciais)
        const removerItemButtons = document.querySelectorAll('.remover-item');
        removerItemButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.parentNode.parentNode.parentNode.remove();
                itemCount--;
            });
        });
    </script>
@endsection