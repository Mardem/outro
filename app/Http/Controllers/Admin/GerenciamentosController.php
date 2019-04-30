<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
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
        $ocorrencias = Gerenciamento::profile(\Auth::user()->category)->paginate();
        return view('admin.gerenciamento.ocorrencia.index', compact('ocorrencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            return view('admin.gerenciamento.ocorrencia.create', compact('request'));
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
            $socio = Socio::find($request->socio_id);

            $request->request->add(['operador_id' => $socio->operador->id]);
            $request->request->add(['data_ocorrencia' => Date::now()->format('Y-m-d')]);

            $g = Gerenciamento::create($request->all());

            return redirect()->route('ocorrencia.show', ['id' => $g->id])->with("success", "Ocorrência criada com sucesso!");
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
            $o = Gerenciamento::find($id);
            $not = Notification::where('gerenciamento_id', $o->id)->first();
            $operador = User::find($o->operador_id);

            $m = Message::where('ocorrencia_id', $id)->paginate();
            return view('admin.gerenciamento.ocorrencia.view')->with(['ocorrencia' => $o, 'notification' => $not, 'operador' => $operador, 'mensagens' => $m]);
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

        /*
         * Função atualiza os dados e atualiza o novo campo com a data formatada
         * para inglês que vem em português da view
         * */
        try {
            //$request->merge(["data_hora" => dataHoraBRparaENG($request->dataContato)]);
            if ($request->situacao == 1) {
                Notification::where('gerenciamento_id', $id)->update(['status' => 1]);
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
            $g = Gerenciamento::find($id);
            Notification::where('gerenciamento_id', $g->id)->delete();
            $g->delete();
            return redirect()->back()->with('success', 'Ocorrência apagada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível remover esta ocorrência: ' . $e->getMessage());
        }
    }

    public function updateNotification(Request $request, Notification $notification)
    {
        try {
            $request->request->add(["day_contact" => dataHoraBRparaENG($request->dataContato)]);
            $notification->update($request->all());
            return redirect()->back()->with('success', 'Notificação atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
