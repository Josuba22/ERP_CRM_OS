<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERP & CRM | Perart</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
        @yield('styles') 
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('dashboard') }}">ERP & CRM Perart Papelaria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('servicos.index') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fornecedores.index') }}">Fornecedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('funcionarios.index') }}">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendas.index') }}">Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cotacoes.index') }}">Orçamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leads.index') }}">Leads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oportunidades.index') }}">Oportunidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('atividades.index') }}">Atividades</a>
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