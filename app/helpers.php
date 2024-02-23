<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


function getCategorica($analise_id, $valor)
    {
        $val = DB::table('var_Categoricas')->select('nome')->where('analise_id',$analise_id)->Where('ordem',$valor)->value('nome');
        return $val;
    }

function traduzSol($sol)
{
    $sol = Str::lower($sol);
    switch ($sol) {
        case 'praticamente insolúvel ou insolúvel':
        case 'praticamente insoluvel ou insoluvel':
            $li_h2o = 1;
            break;
        case 'muito pouco solúvel':
        case 'muito pouco soluvel':
            $li_h2o = 2;
            break;
        case 'pouco solúvel':
        case 'pouco soluvel':
            $li_h2o = 3;
            break;
        case 'moderadamente solúvel':
        case 'moderadamente soluvel':
            $li_h2o = 4;
            break;
        case 'solúvel':
        case 'soluvel':
            $li_h2o = 5;
            break;
        case 'facilmente solúvel':
        case 'facilmente soluvel':
            $li_h2o = 6;
            break;
        case 'muito solúvel':
        case 'muito soluvel':
            $li_h2o = 7;
            break;
        default:
            $li_h2o = 0;
            break;
    }
    
    return $li_h2o;
}




