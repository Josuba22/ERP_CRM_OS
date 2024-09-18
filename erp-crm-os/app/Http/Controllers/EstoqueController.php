<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function estoqueBaixo()
    {
        $produtosBaixoEstoque = Produto::whereColumn('estoque', '<=', 'estoque_minimo')->get();
        
        return view('estoque.baixo', compact('produtosBaixoEstoque'));
    }

    // Outros métodos para gestão de estoque, como entrada e saída de produtos
}
