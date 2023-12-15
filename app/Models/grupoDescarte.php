<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoDescarte extends Model
{
    use HasFactory;

    public function grupoDescarte(): HasMany
    {
        return $this->hasMany(GrupoDescarte::class);
    }

    protected $fillable = [
        'nome',
        'orientacoes',

];
}
