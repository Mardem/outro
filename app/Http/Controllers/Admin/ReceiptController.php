<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReceiptLogs;

class ReceiptController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.recibos.index');
    }

    public function insertLog(Request $request)
    {
        if (
            $request->has('name')  == false ||
            $request->has('cpf') == false ||
            $request->has('number_of_contract') == false ||
            $request->has('number_of_serie') == false ||
            $request->has('operator') == false ||
            $request->has('type')
        ) {
            return redirect()->back();
        } else {
            ReceiptLogs::create($request->all());
            return redirect()->back();
        }
    }
}
