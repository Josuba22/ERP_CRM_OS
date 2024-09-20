@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Leads</h1>

        <a href="{{ route('leads.create') }}" class="btn btn-primary mb-3">Criar Novo Lead</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">ID</th>
                    <th scope = "col">Nome</th>
                    <th scope = "col">Email</th>
                    <th scope = "col">Telefone</th>
                    <th scope = "col">Origem</th>
                    <th scope = "col">Status</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->nome }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->fone }}</td>
                        <td>{{ $lead->origem }}</td>
                        <td>{{ $lead->status }}</td>
                        <td>
                            <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este lead?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection