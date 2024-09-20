@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Editar Lead</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('leads.update', $lead->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $lead->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $lead->email) }}" required>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" value="{{ old('fone', $lead->fone) }}" required>
            </div>

            <div class="form-group">
                <label for="origem">Origem:</label>
                <input type="text" class="form-control" id="origem" name="origem" value="{{ old('origem', $lead->origem) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Novo" {{ old('status', $lead->status) == 'Novo' ? 'selected' : '' }}>Novo</option>
                    <option value="Contatado" {{ old('status', $lead->status) == 'Contatado' ? 'selected' : '' }}>Contatado</option>
                    <option value="Qualificado" {{ old('status', $lead->status) == 'Qualificado' ? 'selected' : '' }}>Qualificado</option>
                    <!-- Adicione outras opções de status conforme necessário -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Lead</button>
        </form>
    </div>
@endsection