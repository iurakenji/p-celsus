<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VarCategorica extends Model
{
    use HasFactory;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Analise::class);
    }

    protected $fillable = [
        'analise_id',
        'ordem',
        'nome',
    ];

    protected $primaryKey = 'id';
}
