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
        'departamento', // Novo campo para o departamento
    ];

    // Relacionamento com a tabela de vendas (sales).
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    // Método para obter os departamentos
    public static function getDepartamentos()
    {
        return ['Vendas', 'Administrativo', 'Financeiro', 'Logística', 'Outro'];
    }
}
