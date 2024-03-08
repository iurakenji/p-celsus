<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class loteFisico extends Model
{
    public function lote(): HasOne {
        return $this->hasOne(Lote::class);
    }

    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }


    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'lote_id',
        'entrada',
        'qt_usada',
        'qt_ajustada',
        'chegada',
        'tratamento_inicio',
        'tratamento_fim',
        'analise_inicio',
        'analise_fim',
        'envase_inicio',
        'envase_fim',
        'liberacao',
        'aprovacao',
        'mp_aprovada',
        'envase_fim',
        'cond_aprovacao',
        'laudo_aprovado',
        'cond_aprovacao',
        'aprovadoPor_id',
        'analisadoPor_id',
        'liberadoPor_id',
        'recebidoPor_id',
        'envasadoPor_id',
        'imagem_1',
        'imagem_2',
        'imagem_3',
        'observacao',
];

protected $primaryKey = 'id';


protected $casts = [
        'entrada' => 'datetime:Y/m/d H:i:s',
        'qt_usada' => 'decimal:4',
        'qt_ajustada' => 'decimal:4',
        'chegada' => 'datetime:Y/m/d',
        'tratamento_inicio' => 'datetime:Y/m/d H:i:s',
        'tratamento_fim' => 'datetime:Y/m/d H:i:s',
        'analise_inicio' => 'datetime:Y/m/d H:i:s',
        'analise_fim' => 'datetime:Y/m/d H:i:s',
        'envase_inicio' => 'datetime:Y/m/d H:i:s',
        'envase_fim' => 'datetime:Y/m/d H:i:s',
        'liberacao' => 'datetime:Y/m/d',
        'aprovacao' => 'datetime:Y/m/d',
        'mp_aprovada' => 'boolean',
        'laudo_aprovado' => 'boolean',
];
}
