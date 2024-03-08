<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class analise_lote extends Pivot
{
    use HasFactory;

    public function referencias(): BelongsTo
    {
        return $this->belongsTo(Referencia::class);
    }

    public function analises(): BelongsTo
    {
        return $this->belongsTo(Analise::class);
    }

    public function lotes(): BelongsTo
    {
        return $this->belongsTo(Lote::class);
    }

    public function observacaos(): BelongsToMany
    {
        return $this->belongsToMany(Observacao::class, 'analiselote_observacao', 'lote_id', 'analise_id', 'observacao_id');
    }

    protected $fillable = [
        'lote_id',
        'analise_id',
        'especificacao',
        'lim_sup',
        'lim_inf',
        'referencia_id',
        'informativo',
        'analise_cq'
];

    protected $primaryKey = 'id';
    protected $table = 'analise_lote';

    protected $casts = [
        'informativo' => 'boolean',
        'analise_cq' => 'boolean'
];

}
