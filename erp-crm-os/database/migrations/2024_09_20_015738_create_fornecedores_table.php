<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('email')->unique();
            $table->string('fone'); // Pode ser string para aceitar formatos diversos
            $table->string('endereco'); 
            $table->string('cnpj'); // CNPJ (opcional)
            $table->string('inscricao_estadual')->nullable(); // Inscrição Estadual
            $table->text('observacoes')->nullable(); // Campo para observações adicionais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
