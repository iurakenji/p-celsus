<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_acesso extends Model
{
    use HasFactory;

    public function usuario(): HasMany {
        return $this->hasMany(Usuario::class,'tipo_acesso');
    }

    protected $fillable = ['nome', 'descricao'];
}

