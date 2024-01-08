<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mp extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function tipo(): BelongsTo {
        return $this->belongsTo(Tipo::class);
    }

    public function grupodescarte(): BelongsTo
    {
        return $this->belongsTo(Grupodescarte::class);
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public $incrementing = false;

    protected $fillable = [
        'codigo',
        'nome',
        'nome_fc',
        'tipo',
        'forma',
        'cas',
        'nome_popular',
        'parte_usada',
        'dci',
        'dcb',
        'bancada',
        'tratado',
        'hormonio',
        'citostatico',
        'enzima',
        'lacto',
        'tintura',
        'producao',
        'grupodescarte_id',
        'patenteado',
        'fornecedor_id'
];

protected $primaryKey = 'id';

    protected $attributes = [
        'tipo' => 'Sólido',
        'bancada' => '0',
        'tratado' => '0',
        'hormonio' => '0',
        'citostatico' => '0',
        'enzima' => '0',
        'lacto' => '0',
        'tintura' => '0',
        'producao' => '0',
        'patenteado' => '0',
    ];

}
