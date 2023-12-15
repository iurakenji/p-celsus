<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupoDescarte extends Model
{
    use HasFactory;

    public function grupodescarte(): HasMany
    {
        return $this->HasMany(Grupodescarte::class);
    }

    protected $fillable = [
        'nome',
        'orientacoes',

];
}
