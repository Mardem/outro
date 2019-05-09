<?php

namespace App\Http\Controllers\Admin\Single\Partner;

use App\Models\Socio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerChangeStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        try {
            $socio = Socio::find($id);
            $socio->situacao = $request->situacao;
            $socio->save();
            return redirect()->back()->with('success', 'Situação alterada com sucesso!');
        } catch (\Error $exception) {
            return redirect()->back()->with('error', 'Não foi possível alterar o status: ' . $exception->getMessage());
        }
    }
}
