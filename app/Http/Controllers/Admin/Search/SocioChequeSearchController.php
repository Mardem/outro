<?php

namespace App\Http\Controllers\Admin\Search;

use App\Models\SociosCheque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocioChequeSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $socios = SociosCheque::where('emitente', 'ILIKE', "%{$request->socio}%")
            ->orWhere('cpf_cnpj', 'ILIKE', "%{$request->socio}%")
            ->orWhere('titulo', 'ILIKE', "%{$request->socio}%")
            ->admin(\Auth::user())
            // ->with('gerenciamentos')
            ->paginate();

        return view('admin.controle.sociosCheque.search', compact('socios'));
    }
}
