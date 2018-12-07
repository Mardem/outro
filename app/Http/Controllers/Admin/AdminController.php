<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gerenciamento;
use App\Models\Notification;
use App\Models\Sms;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    public function index()
    {
        if(\Auth::user()->token != null) {
            $n = Notification::where('user_id', \Auth::user()->id)->where('status', 0)->get();
            $mensagens = Sms::count();
            $ocorrencias = Gerenciamento::count();
            $usuarios = User::count();
            return view('admin.home')->with(['notifications' => $n, 'mensagens' => $mensagens, 'ocorrencias' => $ocorrencias, 'usuarios' => $usuarios]);
        }
        return redirect()->route('token');
    }

    public function token()
    {
        if(\Auth::user()->token != null) {
            return redirect()->route('admin');
        }
        return view('admin.token');
    }

    public function updateToken(Request $request)
    {

        $request->request->add(['email' => \Auth::user()->email, 'password' => $request->password]);
        $this->validateLogin($request);
        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        try {
            User::find(\Auth::user()->id)->update(['token' => $this->responseToken($token)]);
            return redirect()->back()->with('success', 'Identidade confirmada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível configurar o token de segurança: ' . $e->getMessage());
        }
    }

    private function responseToken($token)
    {
        return $token ? $token : redirect()->back()->with('error', \Lang::get('auth.failed'));
    }
}
