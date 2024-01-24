<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mp extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function analises(): BelongsToMany
    {
        return $this->belongsToMany(Analise::class, 'analise_mp', 'mp_id', 'analise_id')->wherePivot('mp_id',$this->id)->withPivot('analise_mp.id','especificacao','lim_sup', 'lim_inf', 'referencia_id', 'informativo','analise_cq');
    }

    public function setors(): BelongsToMany
    {
        return $this->belongsToMany(Setor::class)->as('setor')->wherePivot('mp_id',$this->id);
    }

    public function riscos(): BelongsToMany
    {
        return $this->belongsToMany(Risco::class)->as('risco')->wherePivot('mp_id',$this->id);
    }

    public function observacaos(): BelongsToMany
    {
        return $this->belongsToMany(Observacao::class)->as('observacao')->wherePivot('mp_id',$this->id);
    }

    public function tipo(): BelongsTo {
        return $this->belongsTo(Tipo::class);
    }

    public function grupodescarte(): BelongsTo
    {
        return $this->belongsTo(Grupodescarte::class);
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

   // public $incrementing = false;

    protected $fillable = [
        'codigo',
        'nome',
        'nome_fc',
        'tipo_id',
        'forma',
        'cas',
        'nome_popular',
        'parte_usada',
        'dci',
        'dcb',
        'bancada',
        'tratado',
        'hormonio',
        'citostatico',
        'enzima',
        'lacto',
        'tintura',
        'producao',
        'grupodescarte_id',
        'patenteado',
        'fornecedor_id'
];

protected $primaryKey = 'id';

    protected $attributes = [
        'bancada' => '0',
        'tratado' => '0',
        'hormonio' => '0',
        'citostatico' => '0',
        'enzima' => '0',
        'lacto' => '0',
        'tintura' => '0',
        'producao' => '0',
        'patenteado' => '0',
    ];



}
