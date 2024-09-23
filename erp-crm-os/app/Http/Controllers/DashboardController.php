<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalVendas = Venda::sum('montante_total');
        $totalProdutos = Produto::count();
        $totalClientes = Cliente::count();
        $totalFuncionarios = Funcionario::count();

        // Dados para os gráficos
        $vendasPorMes = Venda::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mes, SUM(montante_total) as total')
            ->groupBy('mes', 'montante_total')
            ->orderBy('mes')
            ->get();

        $produtosPorCategoria = Produto::selectRaw('categoria, COUNT(*) as total')
            // ->join('fornecedores', 'produtos.fornecedor_id', '=', 'fornecedores.id')
            ->groupBy('categoria')
            ->get();

        $clientesPorTipo = Cliente::selectRaw('tipo, COUNT(*) as total')
            ->groupBy('tipo')
            ->get();

        $funcionariosPorCargo = Funcionario::selectRaw('cargo, COUNT(*) as total')
            ->groupBy('cargo')
            ->get();

        return view('dashboard.index', compact(
            'totalVendas',
            'totalProdutos',
            'totalClientes',
            'totalFuncionarios',
            'vendasPorMes',
            'produtosPorCategoria',
            'clientesPorTipo',
            'funcionariosPorCargo',
        ));
    }
}
