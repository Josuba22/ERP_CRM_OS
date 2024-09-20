<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'razao_social',
        'email',
        'fone',
        'endereco',
        'cnpj',
        'inscricao_estadual',
        'observacoes',
    ];

    // Relacionamento com a tabela de produtos (products).
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
