<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSocioObs;
use App\Models\Gerenciamento;
use App\Models\SociosCheque;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

class SociosChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cache::remember('socios', 0, function () {
            return SociosCheque::admin(\Auth::user())->simplePaginate();
        });
        $total = SociosCheque::admin(\Auth::user())->count();
        return view('admin.controle.sociosCheque.index')->with(['socios' => $data, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $operadores = User::where('category', 2)->get();
            $bancos = SociosCheque::BANCO;
            return view('admin.controle.sociosCheque.create', compact('operadores', 'bancos'));
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
            SociosCheque::create($request->all());
            return redirect()->route('sociosCheque.index')->with("success", "Sócio cheque criado com sucesso!");
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Falha ao criar o sócio cheque: " . $e->getMessage());
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
            $operadores = User::operator()->get();
            $socio = SociosCheque::find($id);
            $bancos = SociosCheque::BANCO;

            return view('admin.controle.sociosCheque.view', compact('socio', 'operadores','bancos'));
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
        // Verifica a existência de mudanças no operador, caso haja ele atualiza todos as ocorrências (Gerenciamentos)
        // Gerenciamento::where('operador_id', $request->antigo)
        //     ->where('socio_id', $id)
        //     ->update(['operador_id' => $request->user_id]);

        SociosCheque::find($id)->update($request->all());
        try {
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
            if (\Auth::user()->category == 1) {
                SociosCheque::find($id)->delete();
                return redirect()->back()->with('success', 'Sócio apagado com sucesso!');
            }
            return redirect()->back()->with('error', 'Você não pode executar esta ação');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível remover este sócio: ' . $e->getMessage());
        }
    }

    public function observation(UpdateSocioObs $obs, SocioCheque $socio)
    {
        try {
            $socio->update($obs->all());
            return redirect()->back()->with('success', 'Observação atualizada com sucesso.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
