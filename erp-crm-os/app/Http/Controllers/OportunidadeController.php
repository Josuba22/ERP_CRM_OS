<?php

namespace App\Http\Controllers;

use App\Models\Oportunidade;
use App\Models\Lead;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OportunidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oportunidades = Oportunidade::with(['lead', 'cliente'])->get();
        return view('oportunidades.index', compact('oportunidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leads = Lead::all();
        $clientes = Cliente::all();
        return view('oportunidades.create', compact('leads', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'nullable|exists:leads,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'titulo' => 'required',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'estagio' => 'required',
        ]);

        Oportunidade::create($request->all());

        return redirect()->route('oportunidades.index')->with('success', 'Oportunidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Oportunidade $id)
    {
        return view('oportunidades.show', compact('oportunidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oportunidade $id)
    {
        $leads = Lead::all();
        $clientes = Cliente::all();
        return view('oportunidades.edit', compact('oportunidade', 'leads', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oportunidade $id)
    {
        $request->validate([
            'lead_id' => 'nullable|exists:leads,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'titulo' => 'required',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'estagio' => 'required',
        ]);

        $oportunidade->update($request->all());

        return redirect()->route('oportunidades.index')->with('success', 'Oportunidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oportunidade $id)
    {
        $oportunidade->delete();

        return redirect()->route('oportunidades.index')->with('success', 'Oportunidade excluída com sucesso!');
    }
}
