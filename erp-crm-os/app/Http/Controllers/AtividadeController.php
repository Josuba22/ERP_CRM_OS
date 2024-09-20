<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Lead;
use App\Models\Cliente;
use App\Models\Oportunidade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atividades = Atividade::with(['lead', 'cliente', 'oportunidade'])->get();
        
        return view('atividades.index', compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leads = Lead::all();
        $clientes = Cliente::all();
        $oportunidades = Oportunidade::all();
        return view('atividades.create', compact('leads', 'clientes', 'oportunidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'nullable|exists:leads,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'oportunidade_id' => 'nullable|exists:oportunidades,id',
            'tipo' => 'required',
            'notas' => 'required',
            'data_vencimento' => 'required|date',
            'concluido' => 'boolean',
        ]);

        Atividade::create($request->all());

        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atividade $atividade)
    {
        return view('atividades.show', compact('atividade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atividade $atividade)
    {
        $leads = Lead::all();
        $clientes = Cliente::all();
        $oportunidades = Oportunidade::all();
        return view('atividades.edit', compact('atividade', 'leads', 'clientes', 'oportunidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atividade $atividade)
    {
        $request->validate([
            'lead_id' => 'nullable|exists:leads,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'oportunidade_id' => 'nullable|exists:oportunidades,id',
            'tipo' => 'required',
            'notas' => 'required',
            'data_vencimento' => 'required|date',
            'concluido' => 'boolean',
        ]);

        $atividade->update($request->all());

        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atividade $atividade)
    {
        $atividade->delete();

        return redirect()->route('atividades.index')->with('success', 'Atividade excluída com sucesso!');
    }
}
