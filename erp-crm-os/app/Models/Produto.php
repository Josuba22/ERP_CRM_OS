<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'categoria',
        'descricao', 
        'preco', 
        'estoque', 
        'min_estoque',
        'max_estoque',
        'fornecedor_id',
        'foto', // Adicionado o campo 'foto' aos fillables
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
    public function getFormattedPrecoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }

    // Acessor para obter a URL completa da foto
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset($this->foto) : null;
    }

    // Escopo para produtos com estoque baixo.
    public function scopeEstoqueBaixo($query)
    {
        return $query->whereRaw('estoque <= min_estoque');
    }
}
