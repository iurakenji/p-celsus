<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use App\Models\Observacao;
use Illuminate\Support\Facades\DB;


class MpController extends Controller
{
    //Métodos Análise

    public function analise_index(Mp $mp)
    {

        $analises = $mp->analises->all();

        return view('mps.analise_index', compact('analises','mp'));
    }

    public function analise_show(Mp $mp)
    {
        $analise_add = DB::table('analise_mp')->select('analise_id')->where('mp_id','=',$mp->id);   //verifica duplicidade do registro, retorna somente os que não constam na tabela intermediária
        $analises = DB::table('analises')->whereNotIn('id', $analise_add)->paginate(20);
        return view('mps.analise_show', compact('analises','mp'));
    }

    public function analise_delete(Mp $mp, string $id)
    {

        $mp->analises()->detach($id);
        $analises = $mp->analises->all();

       return redirect()->route('mps.analise_index', compact('analises','mp') );
    }

    public function analise_edit(Mp $mp, string $id, string $novo)
    {
        if ($novo == 'novo') {
            'sim';
        } else {
        $analise = $mp->analises->where('id','=',$id)->join('analises','analises.id','=','analise_id');
        }
        //dd($analise);
       return view('mps.analise_edit', compact('mp','analise'));
    }

    public function analise_save(Mp $mp, string $id)
    {
        $mp->analises()->attach($id, ['lim_sup' => 10, 'lim_inf' => 0, 'referencia_id' => 1, 'informativo' => 0,'analise_cq' => 1]);
        $analises = $mp->analises->where('id','=',$id);

       return view('mps.analise_index', compact('mp','analises'));
    }


    //Métodos Setor

    public function setor_index(Mp $mp)
    {

        $setors = $mp->setors->all();

        return view('mps.setor_index', compact('setors','mp'));
    }

    public function setor_show(Mp $mp)
    {
        $setor_add = DB::table('mp_setor')->select('setor_id')->where('mp_id','=',$mp->id);
        $setors = DB::table('setors')->whereNotIn('id', $setor_add)->paginate(20);
        return view('mps.setor_show', compact('setors','mp'));
    }

    public function setor_delete(Mp $mp, string $id)
    {

        $mp->setors()->detach($id);
        $setors = $mp->setors->all();

       return redirect()->route('mps.setor_index', compact('setors','mp') );
    }

    public function setor_create(Mp $mp, string $id)
    {

        $mp->setors()->attach($id);
        $setors = $mp->setors->all();

       return redirect()->route('mps.setor_index', compact('setors','mp') );
    }

    //Métodos Risco

    public function risco_index(Mp $mp)
    {

        $riscos = $mp->riscos->all();

        return view('mps.risco_index', compact('riscos','mp'));
    }

    public function risco_show(Mp $mp)
    {
        $risco_add = DB::table('mp_risco')->select('risco_id')->where('mp_id','=',$mp->id);
        $riscos = DB::table('riscos')->whereNotIn('id', $risco_add)->paginate(10);
        return view('mps.risco_show', compact('riscos','mp'));
    }

    public function risco_delete(Mp $mp, string $id)
    {

        $mp->riscos()->detach($id);
        $riscos = $mp->riscos->all();

       return redirect()->route('mps.risco_index', compact('riscos','mp') );
    }

    public function risco_create(Mp $mp, string $id)
    {

        $mp->riscos()->attach($id);
        $riscos = $mp->riscos->all();

       return redirect()->route('mps.risco_index', compact('riscos','mp') );
    }

    //Métodos Observações

    public function obs_index(Mp $mp)
    {

        $observacaos = $mp->observacaos->all();

        return view('mps.obs_index', compact('observacaos','mp'));
    }

    public function obs_show(Mp $mp)
    {
        $obs_adicionadas = DB::table('mp_observacao')->select('observacao_id')->where('mp_id','=',$mp->id);
        $observacaos = DB::table('observacaos')->where('tipo','=','Matéria-Prima')->whereNotIn('id', $obs_adicionadas)->paginate(15);
        return view('mps.obs_show', compact('observacaos','mp'));
    }

    public function obs_delete(Mp $mp, string $id)
    {

        $mp->observacaos()->detach($id);
        $observacaos = $mp->observacaos->all();

       return redirect()->route('mps.obs_index', compact('observacaos','mp') );
    }

    public function obs_create(Mp $mp, string $id)
    {

        $mp->observacaos()->attach($id);
        $observacaos = $mp->observacaos->all();

       return redirect()->route('mps.obs_index', compact('observacaos','mp') );
    }

    //Métodos Gerais

     /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $mps = Mp::paginate(10);
        return view('mps.mps', compact('mps'));
    }

    public function query(Request $request)
    {
        $mps = Mp::where('nome','like','%'.$request->chave.'%')->orWhere('nome_fc','like','%'.$request->chave.'%')->orWhere('nome_popular','like','%'.$request->chave.'%')->orWhere('cas','like','%'.$request->chave.'%')->orWhere('codigo','like','%'.$request->chave.'%')->paginate(10);
        return view('mps.mps', compact('mps'));
    }

        /**
     * Display the specified resource.
     */
    public function show(Mp $mp)
    {
        return view('mps.show', compact('mp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mp = new Mp;

        $mp->codigo = $request->codigo;
       $mp->nome = $request->nome;
       $mp->nome_fc = $request->nome_fc;
       $mp->forma = $request->forma;
       $mp->tipo_id = $request->tipo_id;
       $mp->cas = $request->cas;
       $mp->nome_popular = $request->nome_popular;
       $mp->parte_usada = $request->parte_usada;
       $mp->mp_vegetal = $request->mp_vegetal == null ? 0 : 1;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada == null ? 0 : 1;
       $mp->hormonio = $request->hormonio == null ? 0 : 1;
       $mp->citostatico = $request->citostatico == null ? 0 : 1;
       $mp->lacto = $request->lacto == null ? 0 : 1;
       $mp->tintura = $request->tintura == null ? 0 : 1;
       $mp->enzima = $request->enzima == null ? 0 : 1;
       $mp->producao = $request->producao == null ? 0 : 1;
       $mp->micronizado = $request->micronizado == null ? 0 : 1;
       $mp->p344 = $request->p344 == null ? 0 : 1;
       $mp->pf = $request->pf == null ? 0 : 1;
       $mp->pc = $request->pc == null ? 0 : 1;
       $mp->ex = $request->ex == null ? 0 : 1;
       $mp->grupodescarte_id = $request->grupodescarte_id;
       $mp->fornecedor_id = $request->fornecedor_id;

       $mp->save();

       return redirect('/mps');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mp $mp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      //  dd($request);
       $mp = Mp::find($id);

       $mp->codigo = $request->codigo;
       $mp->nome = $request->nome;
       $mp->nome_fc = $request->nome_fc;
       $mp->forma = $request->forma;
       $mp->tipo_id = $request->tipo_id;
       $mp->cas = $request->cas;
       $mp->nome_popular = $request->nome_popular;
       $mp->parte_usada = $request->parte_usada;
       $mp->mp_vegetal = $request->mp_vegetal == null ? 0 : 1;
       $mp->dci = $request->dci;
       $mp->dcb = $request->dcb;
       $mp->bancada = $request->bancada == null ? 0 : 1;
       $mp->hormonio = $request->hormonio == null ? 0 : 1;
       $mp->citostatico = $request->citostatico == null ? 0 : 1;
       $mp->lacto = $request->lacto == null ? 0 : 1;
       $mp->tintura = $request->tintura == null ? 0 : 1;
       $mp->enzima = $request->enzima == null ? 0 : 1;
       $mp->producao = $request->producao == null ? 0 : 1;
       $mp->micronizado = $request->micronizado == null ? 0 : 1;
       $mp->p344 = $request->p344 == null ? 0 : 1;
       $mp->pf = $request->pf == null ? 0 : 1;
       $mp->pc = $request->pc == null ? 0 : 1;
       $mp->ex = $request->ex == null ? 0 : 1;
       $mp->grupodescarte_id = $request->grupodescarte_id;
       $mp->fornecedor_id = $request->fornecedor_id;

       $mp->save();

       return redirect('/mps');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mp::destroy($id);
        return redirect('/mps');
    }
}
