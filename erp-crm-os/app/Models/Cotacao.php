<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'data',
        'montante_total',
        'status',
    ];

    // Relacionamento com a tabela de clientes (customers).
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento com a tabela de itens do orçamento (quote_items).
    public function cotacaoItens()
    {
        return $this->hasMany(ItemCotacao::class);
    }

    // Método para formatar o valor total do orçamento como moeda brasileira.
    public function getFormattedTotalAmountAttribute()
    {
        return 'R$ ' . number_format($this->montante_total, 2, ',', '.');
    }
}
