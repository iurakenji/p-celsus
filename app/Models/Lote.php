<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lote extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function analises(): BelongsToMany
    {
        return $this->belongsToMany(Analise::class, 'analise_mp', 'mp_id', 'analise_id')->wherePivot('mp_id',$this->id)->withPivot('analise_mp.id','analise_id', 'mp_id', 'especificacao','lim_sup', 'lim_inf', 'referencia_id', 'informativo','analise_cq');
    }

    public function mp(): BelongsTo {
        return $this->belongsTo(Mp::class);
    }
    public function armazenamento(): BelongsTo {
        return $this->belongsTo(Armazenamento::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

   // public $incrementing = false;

   public function getFc() {

    $teor = $this->teor;
    $umidade = $this->umidade;

    if ($teor == null || $umidade == null) {
        return 1;
    }

    if ($teor == 100) {
        $fc = 100/(100-$umidade);
    } else {
        $fc = (100/(100-$umidade)*100/$teor);
    }
    return $fc;
    }


   protected $appends = ['fc'];
    protected $fillable = [
        'mp_id',
        'fornecedor_id',
        'situacao',
        'quantidade',
        'validade',
        'certificado',
        'fabricacao',
        'amostra_cq',
        'lote',
        'nf',
        'umidade',
        'teor',
        'armazenamento_id',
        'resp_supri_id',
        'origem',
        'resp_gq_id',
        'entrada',
        'liberacao_gq',
        'urgente',
        'ativ_enz',
        'unidade_ativ_enz',
];

protected $primaryKey = 'id';


protected $casts = [
    'quantidade' => 'decimal:4',
    'urgente' => 'boolean',
    'entrada' => 'datetime:Y/m/d',
    'fc' => 'decimal:2',
    'umidade' => 'decimal:2',
    'teor' => 'decimal:2',
    'validade' => 'datetime:Y/m/d',
    'fabricacao' => 'datetime:Y/m/d',
    'liberacao_gq' => 'datetime:Y/m/d',
    'deleted_at' => 'datetime:Y/m/d',
    'created_at' => 'datetime:Y/m/d',
    'updated_at' => 'datetime:Y/m/d',
];
}
