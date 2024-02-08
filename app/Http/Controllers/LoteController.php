<?php

namespace App\Http\Controllers;

use Illuminate\Support\Number;
use App\Models\Lote;
use App\Models\Mp;
use App\Models\Analise;
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
        $mp = Mp::updateorCreate($request->except('_token', '_method', 'bt_salvar'));
        }
        return view('lotes.conferencia_show_2', compact('mp','lote'));
    }

    public function conferencia_show_3( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $lote = Lote::updateorCreate($request->except('_token', '_method', 'bt_salvar'));
            }
        $analises = DB::table('analise_mp')->join('analises','analise_id','=','analises.id')->where('mp_id',$mp->id)->get();
        //dd($analises);
        return view('lotes.conferencia_show_3', compact('mp','lote', 'analises'));
    }

    public function conferencia_show_4( Mp $mp, Lote $lote, Request $request)
    {
        if ($request->isMethod('put')){
            $lote = Lote::updateorCreate($request->except('_token', '_method', 'bt_salvar'));
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
