<?php

namespace App\Http\Controllers\Admin\Single;

use App\Models\Gerenciamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OccurrencyDirectController extends Controller
{
    public function __invoke(Request $request)
    {
        $request['situacao'] = 2;
        $occurrency = Gerenciamento::create($request->all());
        return redirect()->route('ocorrencia.show', $occurrency->id);
    }
}
