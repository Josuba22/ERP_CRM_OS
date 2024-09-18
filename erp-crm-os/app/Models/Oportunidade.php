<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oportunidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'cliente_id',
        'titulo',
        'descricao',
        'valor',
        'estagio',
    ];

    // Relacionamento com a tabela de leads (leads).
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    // Relacionamento com a tabela de clientes (customers).
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento com a tabela de atividades (activities).
    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    // Método para formatar o valor da oportunidade como moeda brasileira.
    public function getFormattedValueAttribute()
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
}
