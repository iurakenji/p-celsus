<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Analise extends Model
{
    use HasFactory;

    public function comments(): HasMany
    {
        return $this->hasMany(varCategorica::class);
    }

    protected $fillable = [
        'nome',
        'tipo',
        'unidade',
        'observacao',
        'margem',
        'valor_ar',
    ];

    protected $primaryKey = 'id';

    protected $attributes = [
        'tipo' => 'Categórica Nominal',
        'margem' => '0',
        'valor_ar' => '0',
    ];

}
