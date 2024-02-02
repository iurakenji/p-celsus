<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lote extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function mp(): BelongsTo {
        return $this->belongsTo(Mp::class);
    }
    public function armazenamento(): BelongsTo {
        return $this->belongsTo(Armazenamento::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

   // public $incrementing = false;

    protected $fillable = [
        'mp_id',
        'fornecedor_id',
        'situacao',
        'quantidade',
        'validade',
        'fabricacao',
        'lote',
        'nf',
        'umidade',
        'teor',
        'armazenamento_id',
        'resp_supri_id',
        'resp_gq_id',
        'entrada',
        'liberacao_gq',
        'urgente',
        'ativ_enz',
        'unidade_ativ_enz',
];

protected $primaryKey = 'id';

}