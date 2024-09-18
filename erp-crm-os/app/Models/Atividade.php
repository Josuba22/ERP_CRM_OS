<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'cliente_id',
        'oportunidade_id',
        'tipo',
        'notas',
        'data_vencimento',
        'concluido',
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

    // Relacionamento com a tabela de oportunidades (opportunities).
    public function oportunidade()
    {
        return $this->belongsTo(Oportunidade::class);
    }
}
