@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar Cliente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" value="{{ old('fone', $cliente->fone) }}" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $cliente->endereco) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
        </form>
    </div>
@endsection