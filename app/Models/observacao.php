<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class observacao extends Model
{
    use HasFactory;

    public function mps(): BelongsToMany
    {
        return $this->belongsToMany(Mp::class);
    }

    protected $fillable = ['nome', 'observacao'];
}
