<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referencia extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    protected $primaryKey = 'id';
}
