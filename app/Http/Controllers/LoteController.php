<?php

namespace App\Http\Controllers;

use Illuminate\Support\Number;
use App\Models\Lote;
use App\Models\Mp;
use App\Models\Analise;
use App\Models\Analise_lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Facades\URL;

class LoteController extends Controller
{
    public function conferencia_index()
    {
        $lotes = Lote::where('situacao','Aguardando Conferência')->orWhere('situacao','Em Espera')->paginate(10);

            return view('lotes.conferencia_index', compact('lotes'));
    }

    public function conferencia_show_1(Lote $lote)
    {
        $mp = Mp::find($lote->mp->id);
        return view('lotes.conferencia_show_1', compact('mp','lote'));
    }

    public function conferencia_show_2( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $updated = Mp::find($mp->id);
            $updated->where('id',$mp->id)->update($request->except('_token', '_method', 'bt_salvar'));
        }
        return view('lotes.conferencia_show_2', compact('mp','lote'));
    }

    public function conferencia_show_3(Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $updated = Lote::find($lote->id);
            $updated->where('id',$lote->id)->update($request->except('_token', '_method', 'bt_salvar'));
            //$lote = Lote::updateorCreate($request->except('_token', '_method', 'bt_salvar'));
            }
        $analises = $lote->analises;
        //dd($analises);
        $lotes = DB::table('lotes')->where('mp_id',$mp->id)->get();
        if ($lotes->count() > 1){
            $historico = true;
        } else {
            $historico = false; 
        }
        return view('lotes.conferencia_show_3', compact('mp','lote', 'analises', 'historico'));
    }

    public function conferencia_show_3_save( Mp $mp, Lote $lote, Request $request)
    {
        if (!$request->informativo) {
            $request->merge(['informativo' => "0"]);
        }
        if (!$request->analise_cq) {
            $request->merge(['analise_cq' => "0"]);
        }
            dd($request->id);
            if ($lote->analises()->where('id', $request->analise_id)){
                $lote->analises()->updateExistingPivot($request->id, $request->except('_token', '_method', 'bt_salvar'));
                //dd($lote->analises);
            } else {
                $lote->analises()->attach($request->analise_id, $request->except('_token', '_method', 'bt_salvar','id'));
            }
            //$analise_lote = analise_lote::find($request->id);
            //$analise_lote->where('id',$request->id)->update($request->except('_token', '_method', 'bt_salvar'));      
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_3_delete( Mp $mp, Lote $lote, string $id)
    {
        DB::table('analise_lote')->where('id', $id)->delete();
        $analises = Analise_lote::where('lote_id', $lote->id)->get();
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));

    }

    public function conferencia_show_3_addultimo( Mp $mp, Lote $lote)
    {
        $ultimo_lote = DB::table('lotes')->select('id')->where('mp_id',$mp->id)->orderBy('entrada', 'desc')->skip(1)->take(1)->value('id');
        $analises = DB::table('analise_lote')->select('lote_id', 'analise_id', 'especificacao', 'lim_sup', 'lim_inf', 'referencia_id', 'informativo', 'analise_cq')->where('lote_id', $ultimo_lote)->get();
        foreach ($analises as $analise) {
            $analise->lote_id = $lote->id;
            DB::table('analise_lote')->insert((array)$analise);
            dd((array)$analise);
        }
       $analises = Analise_lote::where('lote_id', $lote->id)->get();
       return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_3_addset( Mp $mp, Lote $lote, string $set)
    {
        if ($set == 'solido'){
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 1,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 2,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 3,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 4,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 5,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 6,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            
        }
        if ($set == 'liquido'){
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 1,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 2,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 4,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
        }
        if ($set == 'embalagem'){
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 9,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
        }
        if ($set == 'capsula'){
            DB::table('analise_lote')->insert([
                'lote_id' => $lote->id,
                'analise_id' => 9,
                'especificacao' => '',
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
            ]);
        }
        $analises = Analise_lote::where('lote_id',$lote->id)->get();
        //return redirect()->route('lotes.conferencia_show_4', )
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_4( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $analise_lote = analise_lote::find($request->id);
            $analise_lote->where('id',$lote->id)->update($request->except('_token', '_method', 'bt_salvar'));      
            $analises = Analise_lote::where('lote_id', $lote->id)->get();
            }
        $analises = $mp->analises;
        return view('lotes.conferencia_show_4', compact('mp','lote', 'analises'));
    }

    public function conferencia_show_5( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $lote = Lote::updateorCreate($request->except('_token', '_method', 'bt_salvar'));
            }
        $analises = $mp->analises;
        return view('lotes.conferencia_show_5', compact('mp','lote', 'analises'));
    }

    public function mp_index(Request $request)
    {
        //URL::previous()
        if (is_null($request)) {
        $mps = Mp::paginate(15);
        } else {
        $mps = Mp::where('nome','like','%'.$request->chave.'%')->orWhere('nome_fc','like','%'.$request->chave.'%')->orWhere('nome_popular','like','%'.$request->chave.'%')->orWhere('cas','like','%'.$request->chave.'%')->orWhere('codigo','like','%'.$request->chave.'%')->paginate(10);
        }
            return view('lotes.mp_index', compact('mps'));

    }
     /**
     * Display a listing of the resource.
     */
    public function index(Mp $mp)
    {
        $lotes = Lote::where('mp_id', $mp->id)->paginate(15);

        return view('lotes.lotes', compact('lotes', 'mp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mp $mp)
    {
        return view('lotes.create', compact('mp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Mp $mp)
    {
        $lote = $request->except('_token', '_method', 'bt_entrar');
        $lote = Lote::updateOrCreate($lote);
        $lote->fc = $lote->getFc();
        $lote->save();

        return redirect()->route('lotes.index', ['mp' => $lote->mp_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mp $mp, Lote $lote)
    {
        return view('lotes.show', compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lote = $request->except('_token', '_method', 'bt_entrar');
        $lote = Lote::updateorCreate(['id' => $id] , $lote);
        $lote->fc = $lote->getFc();
        $lote->save();

        return redirect()->route('lotes.index', ['mp' => $lote->mp_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mp = Lote::where('id',$id)->value('mp_id');
        Lote::destroy($id);
        return redirect()->route('lotes.index', ['mp' => $mp]);
    }
}
