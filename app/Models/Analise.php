<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Analise extends Model
{
    use HasFactory;

    public function tipo_mp(): BelongsTo {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function varCategoricas(): HasMany
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
        'tipo_id',
    ];

    protected $primaryKey = 'id';

    protected $attributes = [
        'tipo' => 'Categórica Nominal',
        'margem' => '0',
        'valor_ar' => '0',
        'tipo_id' => '1',
    ];

}
