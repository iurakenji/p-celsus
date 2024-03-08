<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_acesso extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function usuarios(): HasMany {
        return $this->hasMany(Usuario::class,'tipo_acesso');
    }

    protected $fillable = ['nome', 'descricao'];

    protected $primaryKey = 'id';
}

