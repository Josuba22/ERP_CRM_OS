<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'descricao', 
        'preco', 
        'estoque', 
        'min_estoque',
        'max_estoque',
        'fornecedor_id',
    ];

    // Relacionamento com a tabela de fornecedores (suppliers).
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    // Relacionamento com a tabela de itens de venda (sale_items).
    public function vendaItens()
    {
        return $this->hasMany(VendaItem::class);
    }

    /**
     * Relacionamento com a tabela de itens de orçamento (quote_items).
     */
    public function cotacaoItens()
    {
        return $this->morphMany(ItemCotacao::class, 'item');
    }

    // Método para formatar o preço do produto como moeda brasileira.
    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }

    // Escopo para produtos com estoque baixo.
    public function escopoEstoqueBaixo($query)
    {
        return $query->where('estoque', '<=', 'min_estoque');
    }
}
