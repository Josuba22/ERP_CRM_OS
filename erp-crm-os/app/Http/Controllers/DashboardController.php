<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Funcionario;

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

        // Outros dados para o dashboard, como gráficos de vendas, etc.

        return view('dashboard.index', compact(
            'totalVendas',
            'totalProdutos',
            'totalClientes',
            'totalFuncionarios'
            // ... outras variáveis para o dashboard
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
