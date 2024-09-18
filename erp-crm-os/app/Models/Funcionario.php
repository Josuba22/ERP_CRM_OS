<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'fone',
        'cargo',
        'taxa_comissao',
    ];

    // Relacionamento com a tabela de vendas (sales).
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
