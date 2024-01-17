<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'cep',
        'cnpj',
    ];

    protected $primaryKey = 'id';
}
