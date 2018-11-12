<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $n = notificacaoAgendado(\Auth::user()->id);
        return view('admin.home')->with(['notifications' => $n]);
    }

    # Compare dates:
    # http://php.net/manual/pt_BR/datetime.diff.php
}
