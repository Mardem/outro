<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socio;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('email.create');
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
     * @param  \Illuminate\Http\Request $request
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


        //die();
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = env("MAIL_HOST");
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");
            $mail->Password = env("MAIL_PASSWORD");
            $mail->SMTPSecure = 'tls';
            $mail->CharSet = 'UTF-8';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom(env("MAIL_USERNAME"), "Solução - Acessoria de Cobrança");

            //Destinatários
            $emails = $request->data;
            foreach ($emails as &$email) {
                $mail->addAddress($email);
            }

            //Content
            $mail->isHTML(true);
            $mail->Subject = $request->titulo;

            $message = "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"m_-2619326644986470801comment_body\"
           style=\"background-clip:padding-box;border-collapse:collapse;border-color:#e6e6e6;border-radius:0 0 3px 3px;border-style:solid;border-width:2px;width:100%;    border-top-color: red;box-shadow: 1px 1px 10px #e4e2e2;\">
        <tbody>
        <tr>
            <td class=\"m_-2619326644986470801comment_body_td m_-2619326644986470801content-td\" style=\"background-clip:padding-box;background-color:white;border-radius:0 0 3px 3px;color:#525252;font-family:'Helvetica Neue',Arial,sans-serif;font-size:15px;line-height:22px;overflow:hidden;padding:40px 40px 30px\" bgcolor=\"white\">


                <h1 style=\"text-align: center;font-weight: 100;color: #464646;\">Solução Acessoria</h1>
                <p>
                    $request->mensagem
                </p>



            </td>
        </tr>
        </tbody>
    </table>";

            $mail->Body = $message;

            $mail->send();
            return redirect()->back()->with('success', 'Email enviado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possível enviar este email: ' . $e->getMessage());
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
