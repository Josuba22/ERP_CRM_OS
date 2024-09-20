@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Fornecedores</h1>

        <a href="{{ route('fornecedores.create') }}" class="btn btn-primary mb-3">Criar Novo Fornecedor</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">ID</th>
                    <th scope = "col">Razão Social</th>
                    <th scope = "col">Email</th>
                    <th scope = "col">Telefone</th>
                    <th scope = "col">Endereço</th>
                    <th scope = "col">CNPJ</th>
                    <th scope = "col">Inscrição Estadual</th>
                    <th scope = "col">Observações</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->razao_social }}</td>
                        <td>{{ $fornecedor->email }}</td>
                        <td>{{ $fornecedor->fone }}</td>
                        <td>{{ $fornecedor->endereco }}</td>
                        <td>{{ $fornecedor->cnpj }}</td>
                        <td>{{ $fornecedor->inscricao_estadual }}</td>
                        <td>{{ $fornecedor->observacoes }}</td>
                        <td>
                            <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection