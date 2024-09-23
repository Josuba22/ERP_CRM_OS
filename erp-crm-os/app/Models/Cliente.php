<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'email',
        'fone',
        'endereco',
        'tipo', // Novo campo para o tipo de cliente
    ];

    // Relacionamento com a tabela de vendas (sales).
    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    // Relacionamento com a tabela de orçamentos (quotes).
    public function cotacoes()
    {
        return $this->hasMany(Cotacao::class);
    }

    // Relacionamento com a tabela de atividades (activities).
    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    // Relacionamento com a tabela de oportunidades (opportunities).
    public function oportunidades()
    {
        return $this->hasMany(Oportunidade::class);
    }

    // Método para obter os tipos de clientes
    public static function getTipos()
    {
        return ['Pessoa Física', 'Pessoa Jurídica', 'Outro'];
    }
}
