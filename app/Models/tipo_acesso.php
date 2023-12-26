<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tipo_acesso extends Model
{
    use HasFactory;

    public function usuario(): HasMany {
        return $this->hasMany(Usuario::class);
    }

    protected $fillable = ['nome', 'descricao'];
}

