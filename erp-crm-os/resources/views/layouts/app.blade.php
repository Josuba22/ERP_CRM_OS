<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERP & CRM Papelaria</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
        @yield('styles') 
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('dashboard') }}">ERP & CRM Papelaria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('suppliers.index') }}">Fornecedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales.index') }}">Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quotes.index') }}">Orçamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leads.index') }}">Leads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('opportunities.index') }}">Oportunidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activities.index') }}">Atividades</a>
                    </li>
                    <!-- Outros links do menu -->
                </ul>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>