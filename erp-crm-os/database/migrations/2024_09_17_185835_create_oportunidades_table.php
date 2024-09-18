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
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('titulo');
            $table->text('descricao');
            $table->decimal('valor', 8, 2);
            $table->string('estagio'); // Ex: Proposta, Negociação, Fechado, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oportunidades');
    }
};
