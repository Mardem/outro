<?php

use App\Models\Gerenciamento;
use App\Models\Notification;
use App\Models\Socio;
use Jenssegers\Date\Date;

if (!function_exists('novaNotificacao')) {
    /**
     * @param $usuario
     * @param $ocorrencia
     */
    function novaNotificacao($usuario, $ocorrencia)
    {
        $not = new \App\Models\Notification; # Salva a notificação
        $not->user_id = $usuario; # Usuário para que será enviado a notificação
        $not->occurrence_id = $ocorrencia; # O que será enviado
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
        $data = explode('/', $dataParaFormatar);
        $year = explode(' ', $data[2]); # [0] => Ano [1] => Horas
        $date = $year[0] . '-' . $data[1] . '-' . $data[0] . " " . $year[1];
        return $date;
    }
}

if (!function_exists('notificacaoAgendado')) {

    /**
     * @param $usuario
     * @return array/collection
     */
    function notificacaoAgendado ($usuario) {
        $n = Notification::where('user_id', $usuario)->where('status', 0)->get();
        foreach ($n as $not) {
            $a = Gerenciamento::where('id', $not->occurrence_id)->get();

            foreach($a as $oc) {
                $b = Socio::where('id', $oc->socio_id)->first();
                $data = new Date($oc->data_hora);
                $formatada = $data->format('d/m/Y \à\s H:i');

                $t[] = collect(["nome" => $b->nome, "data" => $oc->data_hora, "data_formatada" => $formatada, "qntd" => $n->count()]);
            }
        }
        return $t ?? [];
    }
}