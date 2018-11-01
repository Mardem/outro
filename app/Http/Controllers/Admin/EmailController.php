<?php

namespace App\Http\Controllers\Admin;

use App\Models\Socio;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s = Socio::all();
        return view('admin.contato.email.create')->with(['socios' => $s]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        //$emails = $request->data;
        //$data = explode(',', $emails);
        //print_r($data);
        //$email_c = $data[0];
        //$emails = array('davi.junior07@gmail.com','matheus@basicsistemas.com.br');

        $arquivo = $request->arquivo;

        //die();
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'davi_juniordf@hotmail.com';
            $mail->Password = 'Yagamykira';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('davi_juniordf@hotmail.com', 'Davi');

            //Destinatários
            $emails = $request->data;
            //$data = explode(',', $emails);
            //$email_c = $data[0];
            foreach ($emails as &$email) {
                $mail->addAddress($email);
            }

            //Content
            $mail->isHTML(true);
            $mail->Subject = $request->titulo;
            $mail->Body    = $request->mensagem;

            $mail->send();
            return redirect()->back()->with('success', 'Email enviado com sucesso!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Não foi possível enviar este email: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
