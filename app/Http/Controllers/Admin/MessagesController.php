<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sms;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Sms::orderBy('id', 'desc')->paginate();
        $count = Sms::get();
        return view('admin.contato.messages.index')->with(['messages' => $messages, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.contato.messages.create')->with(['request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = preg_replace("/\D+/", "", $request->phone); // remove qualquer caracter não numérico
        $request->request->add(['phone' => $data]);
        if ($request->type == 0) {

            $direct = directSMS($request->phone, $request->message);
            if ($direct['code'] == 10 && $direct['status'] != true) {
                return redirect()->back()->with('error', 'Limite da conta foi atingido - Entre em contato com o suporte da Zenvia.');
            } else if ($direct['code'] == 00 && $direct['status'] == true) {
                Sms::create($request->all());
                return redirect()->back()->with('success', 'Mensagem enviadas com sucesso!');
            }

        } else {
            $fones = explode(';', $request->phone);
            $multiple = multipeSMS($fones, $request->message);

            if ($multiple[0] == 10) {
                return redirect()->back()->with('error', 'Limite da conta foi atingido - Entre em contato com o suporte da Zenvia.');
            } else {
                return redirect()->back()->with('success', 'Mensagens enviadas com sucesso!');
            }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
