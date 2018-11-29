<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Notification;
use App\Models\Sms;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $n = Notification::where('user_id', \Auth::user()->id)->where('status', 0)->get();
        $mensagens = Sms::count();
        $ocorrencias = Gerenciamento::count();
        $usuarios = User::count();
        return view('admin.home')->with(['notifications' => $n, 'mensagens' => $mensagens, 'ocorrencias' => $ocorrencias, 'usuarios' => $usuarios]);
    }
}
