<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Adicione 'data_nascimento' e 'senha' à lista de campos preenchíveis
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_nascimento', // Adicionando data de nascimento
        'senha',           // Adicionando senha
    ];
}
