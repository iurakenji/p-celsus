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

    public function referencia(): BelongsTo
    {
        return $this->belongsTo(Referencia::class);
    }

    public function analise(): BelongsTo
    {
        return $this->belongsTo(Analise::class);
    }

    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class);
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
