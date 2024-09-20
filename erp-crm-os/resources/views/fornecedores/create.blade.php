@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Criar Novo Fornecedor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fornecedores.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="razao_social">Razão Social:</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ old('razao_social') }}" required>
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
                <label for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj') }}">
            </div>

            <div class="form-group">
                <label for="inscricao_estadual">Inscrição Estadual:</label>
                <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" value="{{ old('inscricao_estadual') }}">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" id="observacoes" name="observacoes">{{ old('observacoes') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Criar Fornecedor</button>
        </form>
    </div>
@endsection