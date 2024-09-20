<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Produto;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with('cliente', 'funcionario')->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('clientes', 'funcionarios', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'itens' => 'required|array',
            'itens.*.produto_id' => 'required|exists:produtos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        $venda = Venda::create([
            'cliente_id' => $request->cliente_id,
            'funcionario_id' => $request->funcionario_id,
            'montante_total' => 0, // Inicializa o valor total como 0
        ]);

        $montanteTotal = 0;

        foreach ($request->itens as $item) {
            $produto = Produto::findOrFail($item['produto_id']);

            $venda->itens_venda()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco' => $produto->preco,
            ]);

            // Atualiza o estoque do produto
            $produto->estoque -= $item['quantidade'];
            $produto->save();

            $montanteTotal += $produto->preco * $item['quantidade'];
        }

        // Atualiza o valor total da venda
        $venda->montante_total = $montanteTotal;
        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function show(Venda $venda)
    {
        $venda->load('cliente', 'funcionario', 'itens_venda.produto');
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $venda->load('itens_venda.produto');
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $produtos = Produto::all();
        return view('vendas.edit', compact('venda', 'clientes', 'funcionarios', 'produtos'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'itens' => 'required|array',
            'itens.*.produto_id' => 'required|exists:produtos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);
    
        // 1. Reverter o estoque dos itens da venda original
        foreach ($venda->itens_venda as $item) {
            $produto = $item->produto;
            $produto->estoque += $item->quantidade;
            $produto->save();
        }
    
        // 2. Excluir os itens da venda original
        $venda->itens_venda()->delete();
    
        // 3. Criar os novos itens da venda
        $montanteTotal = 0;
        foreach ($request->itens as $item) {
            $produto = Produto::findOrFail($item['produto_id']);
    
            $venda->itens_venda()->create([
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco' => $produto->preco,
            ]);
    
            // 4. Atualizar o estoque do produto
            $produto->estoque -= $item['quantidade'];
            $produto->save();
    
            $montanteTotal += $produto->preco * $item['quantidade'];
        }
    
        // 5. Atualizar os dados da venda
        $venda->cliente_id = $request->cliente_id;
        $venda->funcionario_id = $request->funcionario_id;
        $venda->montante_total = $montanteTotal;
        $venda->save();
    
        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Venda $venda)
    {
        // 1. Reverter o estoque dos itens da venda
        foreach ($venda->itens_venda as $item) {
            $produto = $item->produto;
            $produto->estoque += $item->quantidade;
            $produto->save();
        }

        // 2. Excluir os itens da venda
        $venda->itens_venda()->delete();

        // 3. Excluir a venda
        $venda->delete();

        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }
}