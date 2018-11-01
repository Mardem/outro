<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gerenciamento;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesquisasController extends Controller
{
    public function user()
    {
        return User::all();
    }

    public function socio()
    {
        return Socio::all();
    }

    public function search(Request $request)
    {
        $tipo = "";
        $data = [];
        /*
            Tipos de pesquisa:
                    1- Usuários
                    2- Sócios
                    3- Ocorrências
        */

        try {
            switch ($request->tipo){
                case(0):
                    $data = User::where('name', $request->search)->paginate();

                    if($data->count() > 1) {
                        $tipo = "Usuários";
                    } else {
                        $tipo = "Usuário";
                    }
                    break;
                case(1):
                    $data = Socio::where('nome', $request->search)->paginate();

                    if($data->count() > 1) {
                        $tipo = "Sócios";
                    } else {
                        $tipo = "Sócio";
                    }
                    break;
                case(2):
                    $socio = Socio::where('nome', $request->search)->first();
                    $data = Gerenciamento::where('socio_id', $socio->id)->paginate();

                    if($data->count() > 1) {
                        $tipo = "Ocorrências";
                    } else {
                        $tipo = "Ocorrência";
                    }
                    break;
            }

            return view('admin.pesquisa.index')->with(['tipo' => $tipo, 'pesquisa' => $data, 'request' => $request]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível encontrar esta busca! ' . $e->getMessage());
        }
    }
    public function searchRelatorio(Request $request)
    {
        $s = Socio::all();
        $o = Gerenciamento::where('data_ocorrencia','>', $request->data_inicio)->orderBy('id', 'desc')->paginate();
        return view('admin.gerenciamento.relatorio.index')->with(['ocorrencias' => $o, 'socios' => $s]);
    }
}
