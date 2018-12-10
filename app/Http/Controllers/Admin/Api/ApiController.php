<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /*
     * Todos os retornos aqui são de JSON para ser utilizado no DataTable
     * */
    public function users()
    {
        // Retorno para usuários
        return User::all();
    }

    public function partners(Request $request)
    {
        // Retorno para sócio
        if (\Auth::user()->category == 1) {
            $data = Socio::where('nome', 'LIKE', "%{$request->get('socio')}%")->get();
        } else {
            $data = Socio::where('nome', 'LIKE', "%{$request->get('socio')}%")->where('user_id', \Auth::user()->id)->get();
        }

        return $data;
    }

    public function usersSelect2(Request $request)
    {
        // Retorno para operadores
        if (!empty($request->get('socio'))) {
            return User::where('name', 'LIKE', "%{$request->get('user')}%")->where('category', 2)->get();
        }
        return User::where('category', 2)->get();
    }

    public function operatorsSelect(Request $request)
    {
        if (!empty($request->get('socio')) && !empty($request->get('user'))) {
            return User::
            where('name', 'LIKE', "%{$request->get('user')}%")
                ->where('id', $request->get('socio'))
                ->get();
        }
        return User::where('id', $request->get('socio'))->get();
    }

    public function occurrencies()
    {
        // Retorno para ocorrências

        if (\Auth::user()->category == 1) {
            $data = Gerenciamento::with('socio')->get();
        } else {
            $data = Gerenciamento::where('operador_id', \Auth::user()->id)->with('socio')->get();
        }

        return $data;
    }

    public function partnersOperator()
    {
        // Retorno de sócios do operador
        #\Auth::user()->category == 1 ? $data = Socio::all() : $data = Socio::where('user_id', \Auth::user()->cat)->get();

        if (\Auth::user()->category == 1) {
            $data = Socio::all();
        } else {
            $data = Socio::where('user_id', \Auth::user()->id)->get();
        }

        return $data;
    }

}
