<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cotação #{{ $cotacao->id }}</title>
        <style>
            body {
                font-family: sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <h1>Cotação #{{ $cotacao->id }}</h1>

        <p><strong>Cliente:</strong> {{ $cotacao->cliente->nome }}</p>
        <p><strong>Data:</strong> {{ $cotacao->data->format('d/m/Y') }}</p>

        <h2>Itens da Cotação</h2>

        <table>
            <thead>
                <tr>
                    <th scope = "col">Item</th>
                    <th scope = "col">Tipo</th>
                    <th scope = "col">Quantidade</th>
                    <th scope = "col">Preço Unitário</th>
                    <th scope = "col">Total</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($cotacao->itensCotacao as $item)
                    <tr>
                        <td>{{ $item->item->nome }}</td>
                        <td>{{ $item->item_type == 'App\Models\Produto' ? 'Produto' : 'Serviço' }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ $item->formatted_preco }}</td>
                        <td>{{ $item->formatted_total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Valor Total:</strong> {{ $cotacao->formatted_total_amount }}</p>
    </body>
</html>