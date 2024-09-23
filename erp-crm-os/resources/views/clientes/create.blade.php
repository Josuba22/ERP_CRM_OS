@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Novo Cliente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" value="{{ old('fone') }}" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de Cliente:</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Selecione um tipo</option>
                    @foreach(\App\Models\Cliente::getTipos() as $tipo)
                        <option value="{{ $tipo }}" {{ old('tipo') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Criar Cliente</button>
        </form>
    </div>
@endsection