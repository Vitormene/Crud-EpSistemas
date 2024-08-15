<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'observacoes',
        'ativo',
        'whatsapp',
        'contact',
        'cpf',
        'cep',
        'conversion_origin'
    ];
}
