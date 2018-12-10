<?php

use App\Models\Gerenciamento;
use App\Models\Notification;
use App\Models\Socio;
use Jenssegers\Date\Date;
use Zenvia\Model\Sms;
use Zenvia\Model\SmsFacade;

if (!function_exists('novaNotificacao')) {
    /**
     * @param $usuario
     * @param $ocorrencia
     */
    function novaNotificacao($usuario, $ocorrencia)
    {
        $not = new \App\Models\Notification; # Salva a notificação
        $not->user_id = $usuario; # Usuário para que será enviado a notificação
        $not->gerenciamento_id = $ocorrencia; # O que será enviado
        $not->save();
    }
}

if (!function_exists('dataHoraBRparaENG')) {

    /**
     * @param $dataParaFormatar
     * @return string
     */
    function dataHoraBRparaENG($dataParaFormatar)
    {
        $data = str_replace("/", "-", $dataParaFormatar);
        return date('Y-m-d H:i:s', strtotime($data));
    }
}

if (!function_exists('dateTimeToBR')) {

    /**
     * @param $dataParaFormatar
     * @return string
     */
    function dateTimeToBR($dataParaFormatar)
    {
        $data = str_replace("-", "/", $dataParaFormatar);
        return date('d/m/y', strtotime($data));
    }
}

if (!function_exists('notificacaoAgendado')) {

    /**
     * @param $usuario
     * @return array/collection
     */
    function notificacaoAgendado($usuario)
    {
        $n = Notification::where('user_id', $usuario)->where('status', 0)->get();
        foreach ($n as $not) {
            $a = Gerenciamento::where('id', $not->occurrence_id)->get();

            foreach ($a as $oc) {
                $b = Socio::where('id', $oc->socio_id)->first();
                $data = new Date($oc->data_hora);
                $formatada = $data->format('d/m/Y \à\s H:i');

                $t[] = collect(["nome" => $b->nome, "data" => $oc->data_hora, "data_formatada" => $formatada, "qntd" => $n->count()]);
            }
        }
        return $t ?? [];
    }
}

if (!function_exists('directSMS')) {
    /**
     * @param string $phone
     * @param null $message
     * @return array
     */
    function directSMS($phone = '', $message = null)
    {
        preg_replace("/\D+/", "", $phone); // remove qualquer caracter não numérico

        $smsFacade = new SmsFacade(env('ZENVIA_ALIAS'), env('ZENVIA_PASSWORD'), env('ZENVIA_WEBSERVICE'));
        $sms = new Sms();
        $sms->setTo("+55$phone");
        $sms->setMsg("{$message}");
        $sms->setId(uniqid());
        $sms->setCallbackOption(Sms::CALLBACK_NONE);

        $date = new \DateTime();
        $date->setTimeZone(new DateTimeZone ('America/Sao_Paulo'));
        $date->setDate(2014, 7, 28);
        $date->setTime(13, 50, 00);
        $schedule = $date->format("Y-m-d\TH:i:s");

        //Formato da data deve obedecer ao padrão descrito na ISO-8601. Exemplo "2015-12-31T09:00:00"
        $sms->setSchedule($schedule);

        try {
            //Envia a mensagem para o webservice e retorna um objeto do tipo SmsResponse com o status da mensagem enviada
            $response = $smsFacade->send($sms);

            if ($response->getStatusCode() != "00") {
                return [
                    "status" => false,
                    "code" => $response->getStatusCode(),
                    "description" => $response->getDetailDescription()
                ];
            }
            return [
                "status" => true,
                "code" => $response->getStatusCode(),
                "description" => $response->getDetailDescription()
            ];
        } catch (\Exception $ex) {
            return [
                "status" => false,
                "description" => $ex->getMessage(),
            ];
        }
    }
}

if (!function_exists('multipleSMS')) {

    /**
     * @param array $list
     */
    function multipeSMS($fones = [], $message = '')
    {
        $smsFacade = new SmsFacade(env('ZENVIA_ALIAS'), env('ZENVIA_PASSWORD'), env('ZENVIA_WEBSERVICE'));

        $list = [];
        foreach($fones as $fone) {
            $sms = new Sms();
            $sms->setTo("+55$fone");
            $sms->setMsg($message);
            $sms->setId(uniqid());
            $sms->setCallbackOption(Sms::CALLBACK_NONE);


            $date = new \DateTime();
            $date->setTimeZone(new DateTimeZone('America/Sao_Paulo'));
            $date->setDate(2014, 7, 28);
            $date->setTime(13, 50, 0);
            $schedule = $date->format("Y-m-d\TH:i:s");

            //Formato da data deve obedecer ao padrão descrito na ISO-8601. Exemplo "2015-12-31T09:00:00"
            $sms->setSchedule($schedule);
            array_push($list, $sms); // Adiciono no array de lista de SMS
        }

        try {
            //Envia a lista de mensagens para o webservice e retorna uma lista de objetos do tipo SmsResponse com os staus das mensagens enviadas
            $smsFacade->sendMultiple($list);
            $responseList = $smsFacade->sendMultiple($list);
            $responseData = [];
            foreach ($responseList as $response) {
                array_push($responseData, $response->getStatusCode());
            }

            return $responseData;
        } catch (\Exception $ex) {
            return [
                "status" => false,
                "description" => $ex->getMessage(),
            ];
        }
    }
}