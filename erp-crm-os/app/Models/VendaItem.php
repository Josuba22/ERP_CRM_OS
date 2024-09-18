<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'preco',
    ];

    // Relacionamento com a tabela de vendas (sales).
    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    // Relacionamento com a tabela de produtos (products).
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // Método para calcular o valor total do item da venda.
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
