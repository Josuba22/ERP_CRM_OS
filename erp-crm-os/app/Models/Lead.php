<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'fone',
        'fonte',
        'status',
    ];

    // Relacionamento com a tabela de oportunidades (opportunities).
    public function oportunidades()
    {
        return $this->hasMany(Oportunidade::class);
    }

    // Relacionamento com a tabela de atividades (activities).
    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }
}
