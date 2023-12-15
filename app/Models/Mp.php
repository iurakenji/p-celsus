<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mp extends Model
{
    use HasFactory;

    public function grupodescarte(): BelongsTo
    {
        return $this->belongsTo(Grupodescarte::class);
    }

    public $incrementing = false;

    protected $fillable = [
        'codigo',
        'nome',
        'nome_fc',
        'tipo',
        'forma',
        'cas',
        'nome_popular',
        'parte_usada',
        'dci',
        'dcb',
        'port_344',
        'lista_344',
        'pol_fed',
        'pol_civ',
        'exerc',
        'cor',
        'odor',
        'bancada',
        'tratado',
        'hormonio',
        'citostatico',
        'enzima',
        'lacto',
        'tintura',
        'producao',
        'grupodescarte_id',
        'obs',
        'patenteado',
        'fornecedor_id'
];

protected $primaryKey = 'codigo';

    protected $attributes = [
        'tipo' => 'Sólido',
        'port_344' => '0',
        'pol_fed' => '0',
        'pol_civ' => '0',
        'exerc' => '0',
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
