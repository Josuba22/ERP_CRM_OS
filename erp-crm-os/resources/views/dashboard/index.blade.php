@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Vendas</h5>
                        <p class="card-text">R$ {{ number_format($totalSales, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Produtos</h5>
                        <p class="card-text">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Clientes</h5>
                        <p class="card-text">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Funcionários</h5>
                        <p class="card-text">{{ $totalEmployees }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outros elementos do dashboard, como gráficos e tabelas -->

    </div>
@endsection