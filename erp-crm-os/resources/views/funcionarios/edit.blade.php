@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar Funcionário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $funcionario->email) }}" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" value="{{ old('fone', $funcionario->fone) }}" required>
            </div>

            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo', $funcionario->cargo) }}" required>
            </div>

            <div class="form-group">
                <label for="taxa_comissao">Taxa de Comissão:</label>
                <input type="number" class="form-control" id="taxa_comissao" name="taxa_comissao" step="0.01" value="{{ old('taxa_comissao', $funcionario->taxa_comissao) }}">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Funcionário</button>
        </form>
    </div>
@endsection