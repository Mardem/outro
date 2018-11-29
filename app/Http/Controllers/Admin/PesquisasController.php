<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;

class PesquisasController extends Controller
{
    /*
     * Todos os retornos aqui são de JSON para ser utilizado no DataTable
     * */
    public function user()
    {
        // Retorno para usuários
        return User::all();
    }

    public function socio()
    {
        // Retorno para sócio
        return Socio::all();
    }

    public function gerenciamento()
    {
        // Retorno para ocorrências
        return Gerenciamento::with('socio')->get();
    }

    public function searchRelatorio(Request $request)
    {
        $request->merge(["data_inicio" => dataHoraBRparaENG($request->data_inicio), "data_fim" => dataHoraBRparaENG($request->data_fim)]);

        $o = Gerenciamento::whereBetween('data_ocorrencia', [$request->data_inicio, $request->data_fim])->paginate();
        return view('admin.gerenciamento.relatorio.index')->with(['ocorrencias' => $o]);
    }
}
