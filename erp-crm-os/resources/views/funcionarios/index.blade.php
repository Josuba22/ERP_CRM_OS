@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Funcionários</h1>

        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary mb-3">Criar Novo Funcionário</a>

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
                    <th scope = "col">Cargo</th>
                    <th scope = "col">Taxa de Comissão</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ $funcionario->fone }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ $funcionario->taxa_comissao }}</td>
                        <td>
                            <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection