<?php

namespace App\Http\Controllers;

use App\Models\Analise;
use App\Models\Lote;
use App\Models\Mp;
use App\Models\Observacao;
use App\Models\LoteFisico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\URL;

class LoteController extends Controller
{
    public function conferencia_index()
    {
        $lotes = Lote::where('situacao','Aguardando Conferência')->orWhere('situacao','Em Espera')->paginate(10);

            return view('lotes.conferencia_index', compact('lotes'));
    }

    public function conferencia_addObs( Mp $mp, Lote $lote, Observacao $obs)
    {
        if ($obs->tipo == 'Matéria-Prima') {
            $mp->observacaos()->attach($obs->id, ['tipo' => 'Matéria-Prima']);
            return redirect()->route('lotes.conferencia_show_1', compact('mp','lote')); 
        }
        if ($obs->tipo == 'Lote') {
            $lote->observacaos()->attach($obs->id, ['tipo' => 'Lote']);
            return redirect()->route('lotes.conferencia_show_2', compact('mp','lote')); 
        }
    }

    public function conferencia_delObs( Mp $mp, Lote $lote, Observacao $obs)
    {
        if ($obs->tipo == 'Matéria-Prima') {
            $mp->observacaos()->detach($obs->id);
            return redirect()->route('lotes.conferencia_show_1', compact('mp','lote')); 
        }
        if ($obs->tipo == 'Lote') {
            $lote->observacaos()->detach($obs->id);
            return redirect()->route('lotes.conferencia_show_2', compact('mp','lote')); 
        }
    }

    public function conferencia_addObsAnalise( Mp $mp, Lote $lote, Observacao $obs, Analise $analise, string $tipo)
    {
        if ($tipo == 'MA'){
            $analise->observacaos()->attach($obs->id);
        }
        if ($tipo == 'AL') {
            DB::table('obs_add')->insert([
                'relacao_id' => $analise->id,
                'observacao_id' => $obs->id,
                'tipo' => 'Análise de Lote'
            ]);
        }
            return redirect()->route('lotes.conferencia_show_3', compact('mp','lote')); 
    }

    public function conferencia_delObsAnalise( Mp $mp, Lote $lote, Observacao $obs, Analise $analise, string $tipo)
    {
        if ($tipo == 'MA'){
            $analise->observacaos()->detach($obs->id);
        }
        if ($tipo == 'AL') {
            DB::table('obs_add')->where('relacao_id', $analise->id)->where('observacao_id',  $obs->id)->where('tipo', 'Análise de Lote')->delete();
        }
            return redirect()->route('lotes.conferencia_show_3', compact('mp','lote')); 
    }

    public function conferencia_show_1(Lote $lote)
    {
        $mp = Mp::find($lote->mp->id);
        $obs = $mp->observacaos()->get();
        return view('lotes.conferencia_show_1', compact('mp','lote', 'obs'));
    }

    public function conferencia_show_2( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $updated = Mp::find($mp->id);
            $updated->where('id',$mp->id)->update($request->except('_token', '_method', 'bt_salvar'));
        }
        $obs = $lote->observacaos()->get();
        return view('lotes.conferencia_show_2', compact('mp','lote', 'obs'));
    }

    public function conferencia_show_3(Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $lote->where('id',$lote->id)->update($request->except('_token', '_method', 'bt_salvar'));
            }
        $lotes = DB::table('lotes')->where('mp_id',$mp->id)->get();
        if ($lotes->count() > 1){
            $historico = true;
        } else {
            $historico = false; 
        }
        $analises = $lote->analises()->get();
        return view('lotes.conferencia_show_3', compact('mp','lote', 'historico', 'analises'));
    }

    public function conferencia_show_3_save( Mp $mp, Lote $lote, Request $request)
    {
        if (!$request->informativo) {
            $request->merge(['informativo' => "0"]);
        }
        if (!$request->analise_cq) {
            $request->merge(['analise_cq' => "0"]);
        }
        if ($request->lim_inf > $request->lim_sup){
            $temp = $request->lim_inf;
            $request->merge(['lim_inf' => $request->lim_sup]);
            $request->merge(['lim_sup' => $temp]);
            unset($temp);
        }
            if ($lote->analises()->where('id', $request->analise_id)){
                $lote->analises()->updateExistingPivot($request->id, $request->except('_token', '_method', 'bt_salvar'));
            } else {
                $lote->analises()->attach($request->analise_id, $request->except('_token', '_method', 'bt_salvar','id'));
            } 
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_3_delete( Mp $mp, Lote $lote, string $id)
    {
        $lote->analises()->detach($id);
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_3_addultimo( Mp $mp, Lote $lote)
    {
        if ($lote->analises()->count() <> 0) {
            $lote->analises()->detach();
        }
        $ultimo_lote = Lote::where('mp_id',$mp->id)->orderBy('entrada', 'desc')->skip(1)->take(1)->value('id');
        $analises = DB::table('analise_lote')->where('lote_id', $ultimo_lote)->get();
        foreach ($analises as $analise) {
            $analise->lote_id = $lote->id;
            unset($analise->created_at);
            unset($analise->updated_at);
            $lote->analises()->attach([$analise],(array)$analise);
        }
       return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_3_addset( Mp $mp, Lote $lote, string $set)
    {
        if ($lote->analises()->count() <> 0) {
            $lote->analises()->detach();
        }
        if ($set == 'solido'){
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 1,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 2,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 3,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 4,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]); 
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 5,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 6,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            
        }
        if ($set == 'liquido'){
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 1,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 2,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 4,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
        }
        if ($set == 'embalagem'){
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 9,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
        }
        if ($set == 'capsula'){
            $lote->analises()->attach([$lote->id],[
                'lote_id' => $lote->id,
                'analise_id' => 9,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
        }
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }
    
    public function conferencia_show_3_addum( Mp $mp, Lote $lote, string $analise)
    {
        $lote->analises()->attach($analise,[
                'lote_id' => $lote->id,
                'analise_id' => $analise,
                'especificacao' => '',
                'lim_sup' => null,
                'lim_inf' => null,
                'referencia_id' => '1',
                'informativo' => 1,
                'analise_cq' => 1
        ]);
        return redirect()->route('lotes.conferencia_show_3', compact('mp','lote'));
    }

    public function conferencia_show_4( Mp $mp, Lote $lote)
    {
        $obs = DB::table('obs_add')->join('observacaos', 'observacao_id','observacaos.id')->where('relacao_id',$mp->id)->where('obs_add.tipo','Matéria-Prima')->get();
        $obs = $obs->merge(DB::table('obs_add')->join('observacaos', 'observacao_id','observacaos.id')->where('relacao_id',$lote->id)->where('obs_add.tipo','Lote')->get());
        $analises = $lote->analises()->get();
        $obs_an = collect();
        foreach ($analises as $analise) {
            $obs_an = $obs_an->merge(DB::table('obs_add')->join('observacaos', 'observacao_id','observacaos.id')->where('relacao_id',$analise->id)->where('obs_add.tipo','Método Analítico')->get());
            $an_lote = DB::table('analise_lote')->select('id')->where('lote_id',$lote->id)->where('analise_id',$analise->id)->value('id');
            $obs_an = $obs_an->merge(DB::table('obs_add')->join('observacaos', 'observacao_id','observacaos.id')->where('relacao_id', $an_lote)->where('obs_add.tipo','Análise de Lote')->get());
        }
        $cont = 0;
        foreach ($obs_an as $obs_a) {
            $cont++;
            $obs_a->indice = str_repeat('*', $cont);
        }
        //dd($obs_an);
        return view('lotes.conferencia_show_4', compact('mp','lote', 'obs', 'obs_an'));
    }

    public function conferencia_show_5(Mp $mp, Lote $lote)
    {
        $usuario = Auth::user();
        //dd($mp);
        $lote->where('id', $mp->id)->update(['situacao' => 'Liberado', 'liberacao_gq' => now(), 'resp_gq_id' => $usuario->id]);
        return redirect()->route('lotes.conferencia_index');
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
        $usuario = Auth::user();
        $lote = $request->except('_token', '_method', 'bt_entrar');
        $lote = $lote + (['resp_supri_id' => $usuario->id]);
        //dd($lote);
        $lote = Lote::updateOrCreate($lote);
        $lote->fc = $lote->getFc();
        $lote->save();
        $loteFisico = LoteFisico::create([
            'lote_id' => $lote->id
        ]);

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
