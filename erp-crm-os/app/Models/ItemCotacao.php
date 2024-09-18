<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCotacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'cotacao_id',
        'item_id',
        'tipo_item',
        'quantidade',
        'preco',
    ];

    // Relacionamento com a tabela de orçamentos (quotes).
    public function cotacao()
    {
        return $this->belongsTo(Cotacao::class);
    }

    // Relacionamento polimórfico com as tabelas de produtos (products) e serviços (services).
    public function item()
    {
        return $this->morphTo();
    }

    // Método para calcular o valor total do item do orçamento.
    public function getTotalAttribute()
    {
        return $this->quantidade * $this->preco;
    }

    // Método para formatar o valor total do item como moeda brasileira.
    public function getFormattedTotalAttribute()
    {
        return 'R$ ' . number_format($this->total, 2, ',', '.');
    }
}
