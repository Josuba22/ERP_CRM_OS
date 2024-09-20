@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Visualizar Venda</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Venda #{{ $venda->id }}</h5>
                <p class="card-text"><strong>Cliente:</strong> {{ $venda->cliente->nome }}</p>
                <p class="card-text"><strong>Funcionário:</strong> {{ $venda->funcionario->nome }}</p>
                <p class="card-text"><strong>Valor Total:</strong> {{ $venda->formatted_total_amount }}</p>
                <p class="card-text"><strong>Data da Venda:</strong> {{ $venda->created_at->format('d/m/Y H:i:s') }}</p>

                <h2>Itens da Venda</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope = "col">Produto</th>
                            <th scope = "col">Quantidade</th>
                            <th scope = "col">Preço Unitário</th>
                            <th scope = "col">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venda->vendaItens as $item)
                            <tr>
                                <td>{{ $item->produto->nome }}</td>
                                <td>{{ $item->quantidade }}</td>
                                <td>{{ $item->formatted_preco }}</td>
                                <td>{{ $item->formatted_total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('vendas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection