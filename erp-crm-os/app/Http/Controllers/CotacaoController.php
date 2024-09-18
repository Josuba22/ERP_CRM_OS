<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Servico;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotacoes = Cotacao::with('cliente')->get();

        return view('cotacoes.index', compact('cotacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $servicos = Servico::all();

        return view('cotacoes.create', compact('clientes', 'produtos', 'servicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data' => 'required|date',
            'itens' => 'required|array',
            'itens.*.tipo' => 'required|in:produto,servico',
            'itens.*.item_id' => 'required|exists:produtos,id|exists:servicos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        $cotacao = Cotacao::create([
            'cliente_id' => $request->cliente_id,
            'data' => $request->data,
            'valor_total' => 0,
        ]);

        $valorTotal = 0;

        foreach ($request->itens as $item) {
            if ($item['tipo'] == 'produto') {
                $produto = Produto::findOrFail($item['item_id']);
                $preco = $produto->preco;
            } else {
                $servico = Servico::findOrFail($item['item_id']);
                $preco = $servico->preco;
            }

            $cotacao->itensCotacao()->create([
                'item_id' => $item['item_id'],
                'item_type' => $item['tipo'] == 'produto' ? Produto::class : Servico::class,
                'quantidade' => $item['quantidade'],
                'preco' => $preco,
            ]);

            $valorTotal += $preco * $item['quantidade'];
        }

        $cotacao->valor_total = $valorTotal;
        $cotacao->save();

        return redirect()->route('cotacoes.index')->with('success', 'Cotação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('cotacoes.show', compact('cotacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $servicos = Servico::all();

        return view('cotacoes.edit', compact('cotacao', 'clientes', 'produtos', 'servicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data' => 'required|date',
            'itens' => 'required|array',
            'itens.*.tipo' => 'required|in:produto,servico',
            'itens.*.item_id' => 'required|exists:produtos,id|exists:servicos,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        $cotacao->cliente_id = $request->cliente_id;
        $cotacao->data = $request->data;
        $cotacao->valor_total = 0;
        $cotacao->save();

        $cotacao->itensCotacao()->delete();

        $valorTotal = 0;

        foreach ($request->itens as $item) {
            if ($item['tipo'] == 'produto') {
                $produto = Produto::findOrFail($item['item_id']);
                $preco = $produto->preco;
            } else {
                $servico = Servico::findOrFail($item['item_id']);
                $preco = $servico->preco;
            }

            $cotacao->itensCotacao()->create([
                'item_id' => $item['item_id'],
                'item_type' => $item['tipo'] == 'produto' ? Produto::class : Servico::class,
                'quantidade' => $item['quantidade'],
                'preco' => $preco,
            ]);

            $valorTotal += $preco * $item['quantidade'];
        }

        $cotacao->valor_total = $valorTotal;
        $cotacao->save();

        return redirect()->route('cotacoes.index')->with('success', 'Cotação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cotacao->itensCotacao()->delete();
        $cotacao->delete();

        return redirect()->route('cotacoes.index')->with('success', 'Cotação excluída com sucesso!');
    }

    public function downloadPdf(Cotacao $cotacao)
    {
        $pdf = PDF::loadView('cotacoes.pdf', compact('cotacao'));
        return $pdf->download('cotacao_' . $cotacao->id . '.pdf');
    }

    public function downloadExcel(Cotacao $cotacao)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Preencha o spreadsheet com os dados da cotação

        $writer = new Xlsx($spreadsheet);

        $response = new Response($writer->save('php://output'));
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="cotacao_' . $cotacao->id . '.xlsx"');
        $response->headers->set('Cache-Control','max-age=0');

        return $response;
    }
}
