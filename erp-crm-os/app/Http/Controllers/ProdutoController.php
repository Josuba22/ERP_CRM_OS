<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::with('fornecedor');

        if($request->has('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        $produtos = $query->get();
        $categorias = Produto::distinct('categoria')->pluck('categoria');

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.create', compact('fornecedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required|string',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'min_estoque' => 'required|integer',
            'max_estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produto = new Produto($request->all());

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produtos', 'public');
            $produto->foto = $path;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        return view('produtos.edit', compact('produto', 'fornecedores'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required|string',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'min_estoque' => 'required|integer',
            'max_estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produto->fill($request->except('foto'));

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($produto->foto) {
                Storage::disk('public')->delete($produto->foto);
            }
            $path = $request->file('foto')->store('produtos', 'public');
            $produto->foto = $path;
        }

        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->foto) {
            Storage::disk('public')->delete($produto->foto);
        }
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}
