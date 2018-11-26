<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DateTimeZone;
use Zenvia\Model\Sms;
use Zenvia\Model\SmsFacade;

class SMSController extends Controller
{
    public function unique()
    {
        $smsFacade = new SmsFacade(env('ZENVIA_ALIAS'), env('ZENVIA_PASSWORD'), env('ZENVIA_WEBSERVICE'));
        $sms = new Sms();
        $sms->setTo("5561996900317");
        $sms->setMsg("Este é ã um teste de envio de mensagem simples utilizando a api PHP com o Laravel.");
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
            echo "Status: " . $response->getStatusCode() . " - " . $response->getStatusDescription();
            echo "\nDetalhe: " . $response->getDetailCode() . " - " . $response->getDetailDescription();

            if ($response->getStatusCode() != "00") {
                echo "\nMensagem não pôde ser enviada.";
            }
        } catch (\Exception $ex) {
            echo "Falha ao fazer o envio da mensagem. Exceção: " . $ex->getMessage() . "\n" . $ex->getTraceAsString();
        }
    }

    public function multiple()
    {
        $smsFacade = new SmsFacade(env('ZENVIA_ALIAS'), env('ZENVIA_PASSWORD'), env('ZENVIA_WEBSERVICE'));
        $smsList = [];

        $sms = new Sms();
        $sms->setTo("5561996900317");
        $sms->setMsg("Este é um teste de envio de mensagem multiplo utilizando a api php.");
        $sms->setId(uniqid());
        $sms->setCallbackOption(Sms::CALLBACK_NONE);

        $date = new \DateTime();
        $date->setTimeZone(new DateTimeZone('America/Sao_Paulo'));
        $date->setDate(2014, 7, 28);
        $date->setTime(13, 50, 0);
        $schedule = $date->format("Y-m-d\TH:i:s");

        //Formato da data deve obedecer ao padrão descrito na ISO-8601. Exemplo "2015-12-31T09:00:00"
        $sms->setSchedule($schedule);

        array_push($smsList, $sms); // Adiciono no array de lista de SMS

        $sms2 = new Sms();
        $sms2->setTo("5561996266111");
        $sms2->setMsg("Este é um teste de envio de mensagem multiplo utilizando a api php.");
        $sms2->setId(uniqid());
        $sms2->setCallbackOption(Sms::CALLBACK_NONE);

        $date2 = new \DateTime();
        $date2->setTimeZone(new DateTimeZone('America/Sao_Paulo'));
        $date2->setDate(2014, 7, 28);
        $date2->setTime(13, 50, 00);
        $schedule2 = $date2->format("Y-m-d\TH:i:s");

        //Formato da data deve obedecer ao padrão descrito na ISO-8601. Exemplo "2015-12-31T09:00:00"
        $sms2->setSchedule($schedule2);

        array_push($smsList, $sms2);
        try {
            //Envia a lista de mensagens para o webservice e retorna uma lista de objetos do tipo SmsResponse com os staus das mensagens enviadas
            $responseList = $smsFacade->sendMultiple($smsList);
            foreach ($responseList as $response) {
                echo "Status: " . $response->getStatusCode() . " - " . $response->getStatusDescription();
                echo "\nDetalhe: " . $response->getDetailCode() . " - " . $response->getDetailDescription() . "\n";
            }
        } catch (\Exception $ex) {
            echo "Falha ao fazer o envio das mensagens. Exceção: " . $ex->getMessage() . "\n" . $ex->getTraceAsString();
        }
    }

    public function received()
    {
        $smsFacade = new SmsFacade(env('ZENVIA_ALIAS'), env('ZENVIA_PASSWORD'), env('ZENVIA_WEBSERVICE'));

        try {
            //Lista todas mensagens recebidas que ainda não foram consultadas. Retorna um objeto do tipo SmsReceivedResponse
            //que conterá as mensagens recebidas.
            $response = $smsFacade->listMessagesReceived();
            echo "Status: " . $response->getStatusCode() . " - " . $response->getStatusDescription();
            echo "\nDetalhe: " . $response->getDetailCode() . " - " . $response->getDetailDescription();
            
            if ($response->hasMessages()) {
                $messages = $response->getReceivedMessages();
                foreach ($messages as $smsReceived) {
                    echo "\nCelular: " . $smsReceived->getMobile();
                    echo "\nData de recebimento: " . $smsReceived->getDateReceived();
                    echo "\nMensagem: " . $smsReceived->getBody();
                    //Id da mensagem que originou a mensagem de resposta
                    echo "\nId da mensagem de origem: " . $smsReceived->getSmsOriginId();
                }
            } else {
                echo "\nNão foram encontradas mensagens recebidas.";
            }
        } catch (\Exception $ex) {
            echo "Falha ao listar as mensagens recebidas. Exceção: " . $ex->getMessage() . "\n" . $ex->getTraceAsString();
        }
    }
}
