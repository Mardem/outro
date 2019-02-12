<?php

namespace App\Observers;

use App\Models\Notification;

class NovaNotificacao
{
    public function created($ocorrencia)
    {
        if($ocorrencia->situacao == 3) {
            $not = new Notification; # Salva a notificação
            $not->user_id = $ocorrencia->operador_id; # Usuário para que será enviado a notificação
            $not->gerenciamento_id = $ocorrencia->id; # O que será enviado
            $not->socio_id = $ocorrencia->socio_id;
            $not->day_contact = $ocorrencia->data_hora;
            $not->save();
        }
    }

    public function updated($ocorrencia)
    {
        if($ocorrencia->situacao == 3) {
            $not = new Notification; # Salva a notificação
            $not->user_id = $ocorrencia->operador_id; # Usuário para que será enviado a notificação
            $not->gerenciamento_id = $ocorrencia->id; # O que será enviado
            $not->socio_id = $ocorrencia->socio_id;
            $not->day_contact = $ocorrencia->data_hora;
            $not->save();
        }
    }
}