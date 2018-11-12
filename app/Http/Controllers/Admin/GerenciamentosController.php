<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Socio;
use Illuminate\Http\Request;
use Mockery\Exception;

class GerenciamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s = Socio::all();
        $o = Gerenciamento::orderBy('id', 'desc')->paginate();
        return view('admin.gerenciamento.ocorrencia.index')->with(['ocorrencias' => $o, 'socios' => $s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $s = Socio::all();
            return view('admin.gerenciamento.ocorrencia.create')->with(['socios' => $s]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao carregar os dados: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $request->merge(["data_hora" => dataHoraBRparaENG($request->dataContato)]);

            $g = Gerenciamento::create($request->all());
            novaNotificacao(\Auth::user()->id, $g->id);

            return redirect()->route('ocorrencia.show', ['id' => $g])->with("success", "Ocorrência criada com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Falha ao criar a ocorrência: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $s = Socio::all();
            $o = Gerenciamento::find($id);
            $m = Message::where('ocorrencia_id', $id)->paginate();
            return view('admin.gerenciamento.ocorrencia.view')->with(['ocorrencia' => $o, 'socios' => $s, 'mensagens' => $m]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível econtrar esta ocorrência: ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $data = explode('/', $request->dataContato);
            $year = explode(' ', $data[2]); # [0] => Ano [1] => Horas
            $date = $year[0] . '-' . $data[1] . '-' . $data[0] . " " . $year[1];
            $request->merge(["data_hora" => $date]);

            if($request->situacao == 1) {
                Notification::where('occurrence_id', $id)->update(['status' => 1]);
            }

            Gerenciamento::find($id)->update($request->all());
            return redirect()->back()->with('success', 'Ocorrência atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel alterar esta ocorrência: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Message::where('ocorrencia_id', $id)->delete();
            Gerenciamento::find($id)->delete();
            return redirect()->back()->with('success', 'Ocorrência apagada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível remover esta ocorrência: ' . $e->getMessage());
        }
    }
}
