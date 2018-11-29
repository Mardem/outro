<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Socio;
use App\User;

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

    public function partners()
    {
        // Retorno para sócio
        return Socio::all();
    }

    public function occurrencies()
    {
        // Retorno para ocorrências
        return Gerenciamento::with('socio')->get();
    }
}
