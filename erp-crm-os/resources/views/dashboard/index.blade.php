@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card clickable" data-chart="vendas">
                    <div class="card-body text-white bg-info">
                        <h5 class="card-title">Total de Vendas</h5>
                        <p class="card-text">R$ {{ number_format($totalVendas, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card clickable" data-chart="produtos">
                    <div class="card-body text-white bg-info">
                        <h5 class="card-title">Total de Produtos</h5>
                        <p class="card-text">{{ $totalProdutos }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card clickable" data-chart="clientes">
                    <div class="card-body text-white bg-info">
                        <h5 class="card-title">Total de Clientes</h5>
                        <p class="card-text">{{ $totalClientes }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card clickable" data-chart="funcionarios">
                    <div class="card-body text-white bg-info">
                        <h5 class="card-title">Total de Funcionários</h5>
                        <p class="card-text">{{ $totalFuncionarios }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gráfico</h5>
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-secondary" id="toggleChartType">Alternar Tipo de Gráfico</button>
                        </div>

                        <div class="chart-container">
                            <canvas id="chartCanvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let currentChart = null;
        let currentChartType = 'bar';
        let currentDataset = null;

        const chartData = {
            vendas: {
                labels: {!! json_encode($vendasPorMes->pluck('mes')) !!},
                data: {!! json_encode($vendasPorMes->pluck('total')) !!},
                label: 'Vendas por Mês'
            },
            produtos: {
                labels: {!! json_encode($produtosPorCategoria->pluck('categoria')) !!},
                data: {!! json_encode($produtosPorCategoria->pluck('total')) !!},
                label: 'Produtos por Categoria'
            },
            clientes: {
                labels: {!! json_encode($clientesPorTipo->pluck('tipo')) !!},
                data: {!! json_encode($clientesPorTipo->pluck('total')) !!},
                label: 'Clientes por Tipo'
            },
            funcionarios: {
                labels: {!! json_encode($funcionariosPorCargo->pluck('cargo')) !!},
                data: {!! json_encode($funcionariosPorCargo->pluck('total')) !!},
                label: 'Funcionários por Cargo'
            }
        };

        function createChart(type, data) {
            const ctx = document.getElementById('chartCanvas').getContext('2d');

            if (currentChart) {
                currentChart.destroy();
            }

            currentChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: data.label,
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }

        document.querySelectorAll('.card.clickable').forEach(card => {
            card.addEventListener('click', function() {
                const datasetKey = this.dataset.chart;
                currentDataset = chartData[datasetKey];
                createChart(currentChartType, currentDataset);
            });
        });

        document.getElementById('toggleChartType').addEventListener('click', function() {
            currentChartType = currentChartType === 'bar' ? 'pie' : 'bar';
            if (currentDataset) {
                createChart(currentChartType, currentDataset);
            }
        });
    </script>

    <style>
        .chart-container {
            position: relative;
            height: 50vh;
            width: 100%;
            max-height: 400px;
        }
        .card.clickable {
            cursor: pointer;
            transition: box-shadow 0.3s ease-in-out;
        }
        .card.clickable:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
@endsection
