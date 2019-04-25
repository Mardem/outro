<?php

namespace App\Http\Controllers\Admin\Search;

use App\Models\Socio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $result = Socio::where('nome', 'LIKE', "%{$request->socio}%")
            ->orWhere('titulo', 'LIKE', "%{$request->socio}%")
            ->admin(\Auth::user())
            ->with('gerenciamentos')
            ->paginate();

        $total = Socio::where('nome', 'LIKE', "%{$request->get('socio')}%")->admin(\Auth::user())->count();
        return view('admin.controle.socios.search')->with(['socios' => $result, 'total' => $total]);
    }
}
