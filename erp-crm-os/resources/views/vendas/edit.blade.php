@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar Venda</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendas.update', $venda->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $venda->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="funcionario_id">Funcionário:</label>
                <select class="form-control" id="funcionario_id" name="funcionario_id" required>
                    <option value="">Selecione um funcionário</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionario_id', $venda->funcionario_id) == $funcionario->id ? 'selected' : '' }}>{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>

            <h2>Itens da Venda</h2>

            <div id="itens-venda">
                @forelse($venda->itens_venda as $index => $item)
                    <div class="item-venda mt-2">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="produto_id">Produto:</label>
                                <select class="form-control" name="itens[{{ $index }}][produto_id]" required>
                                    <option value="">Selecione um produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}" {{ $produto->id == $item->produto_id ? 'selected' : '' }}>{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" class="form-control" name="itens[{{ $index }}][quantidade]" min="1" value="{{ $item->quantidade }}" required>
                            </div>
                            <div class="form-group col-md-1">
                                <button type="button" class="btn btn-danger btn-sm remover-item">Remover</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Não há itens nesta venda.</p>
                @endforelse
            </div>

            <div>
                <div>
                    <button type="button" class="btn btn-secondary" id="adicionar-item">Adicionar Item</button>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary mt-3">Atualizar Venda</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let itemCount = {{ $venda->itens_venda->count() }};

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

            addRemoveItemListener(newItem.querySelector('.remover-item'));
        });

        function addRemoveItemListener(button) {
            button.addEventListener('click', function() {
                this.closest('.item-venda').remove();
            });
        }

        // Adiciona evento para remover item (itens iniciais)
        document.querySelectorAll('.remover-item').forEach(addRemoveItemListener);
    </script>
@endsection
