<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco', 
    ];

    public function getFormattedPrecoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
}
