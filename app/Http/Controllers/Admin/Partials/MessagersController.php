<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Models\Message;
use App\Models\Socio;
use App\Models\Gerenciamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Message::create($request->all());
            return redirect()->back()->with("success", "Mensagem criada com sucesso!");
        } catch (\Exception $e){
            return redirect()->back()->with("error", "Falha ao criar a mensagem: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $m = Message::find($id);
            $o = Gerenciamento::where('id', $m->ocorrencia_id)->first();
            return view('admin.gerenciamento.mensagem.view')->with(['mensagem' => $m, 'ocorrencia' =>$o]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível econtrar esta mensagem: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Message::find($id)->update($request->all());
            return redirect()->back()->with('success', 'Mensagem atualizada com sucesso!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possivel alterar esta mensagem: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Message::find($id)->delete();
            return redirect()->back()->with('success', 'Mensagem apagada com sucesso!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possível remover esta ocorrência: ' . $e->getMessage());
        }
    }
}
