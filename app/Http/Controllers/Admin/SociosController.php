<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Auth::user()->category == 1 ? $s = Socio::orderBy('id', 'desc')->paginate() : $s = Socio::orderBy('id', 'desc')->where('operador_id', \Auth::user()->category)->paginate();
        return view('admin.controle.socios.index')->with(['socios' => $s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $o = User::where('category', 2)->get();
            return view('admin.controle.socios.create')->with(['operadores' => $o]);
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
            Socio::create($request->all());
            return redirect()->route('socios.index')->with("success", "Sócio criado com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Falha ao criar o sócio: " . $e->getMessage());
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
            $s = Socio::find($id);
            $o = User::where('category', '2')->get();
            return view('admin.controle.socios.view')->with(['socio' => $s, 'operadores' => $o]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível econtrar este sócio: ' . $e->getMessage());
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
            Socio::find($id)->update($request->all());
            return redirect()->back()->with('success', 'Sócio atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel alterar este sócio: ' . $e->getMessage());
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
            Socio::find($id)->delete();
            return redirect()->back()->with('success', 'Sócio apagado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível remover este sócio: ' . $e->getMessage());
        }
    }
}
