<?php

namespace App\Observers;

use App\Models\Socio;

class AtualizarDesignacao
{
    public function updated($socio)
    {
        // Verificação se houve alguma alteração no operador antigo
        if($socio->isDirty('user_id')){
            Socio::find($socio->id)->update(['designado' => now()->format('Y-m-d')]);
        }
    }
}