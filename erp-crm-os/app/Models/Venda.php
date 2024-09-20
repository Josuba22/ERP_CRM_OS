<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'funcionario_id',
        'montante_total',
    ];

    // Relacionamento com a tabela de clientes (customers).
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento com a tabela de funcionários (employees).
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // Relacionamento com a tabela de itens de venda (sale_items).
    public function itens_venda()
    {
        return $this->hasMany(ItemVenda::class, 'venda_id');
    }

    // Método para formatar o valor total da venda como moeda brasileira.
    public function getFormattedTotalAmountAttribute()
    {
        return 'R$ ' . number_format($this->montante_total, 2, ',', '.');
    }
}
