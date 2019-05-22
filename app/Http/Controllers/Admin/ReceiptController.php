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
        ReceiptLogs::create($request->all());
        return redirect()->back();
    }
}
