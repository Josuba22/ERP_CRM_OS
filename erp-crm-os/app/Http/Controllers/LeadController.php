<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::all();

        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:leads',
            'fone' => 'required',
            'origem' => 'required',
            'status' => 'required',
        ]);

        Lead::create($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'fone' => 'required',
            'origem' => 'required',
            'status' => 'required',
        ]);

        $lead->update($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Lead excluído com sucesso!');
    }
}
