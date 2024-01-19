<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo extends Model
{
    use HasFactory;

    public function analise(): HasMany
    {
        return $this->hasMany(Analise::class);
    }

    protected $fillable = ['nome', 'descricao'];

    protected $primaryKey = 'id';
}
