<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = User::orderBy('id', 'desc')->paginate(); #lista
        $a = User::where('situacao', 0)->count(); #ativos
        $i = User::where('situacao', 1)->count(); # inativos
        $o = User::where('category', 2)->count(); #operador
        return view('admin.controle.usuarios.index')->with(['usuarios' => $u, 'ativos' => $a, 'inativos' => $i, 'operadores' => $o]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.controle.usuarios.create');
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
            $data = array_merge($request->all(), [
                'password' => Hash::make($request->password),
            ]);

            $user = User::create($data);
            return redirect()->route('usuario.index')->with("success", $user->name . " foi criado com sucesso!");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível cadastrar o usuário: ' . $e->getMessage());
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
            $u = User::find($id);
            return view('admin.controle.usuarios.view')->with(['usuario' => $u]);
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possível encontrar este usuário: ' . $e->getMessage());
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
            User::find($id)->update($request->all());
            return redirect()->route('usuario.index')->with('success', 'Usuário editado com sucesso!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possível alterar este usuário: ' . $e->getMessage());
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
            User::find($id)->delete();
            return redirect()->route('usuario.index')->with("success", "Usuário apagado com sucesso!");
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possível apagar este usuário: ' . $e->getMessage());
        }
    }
}
