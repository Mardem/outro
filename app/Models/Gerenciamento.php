<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Gerenciamento extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'socio_id',
        'situacao',
        'data_hora',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'socio_id',
        'operador_id',
        'data_ocorrencia',
        'titulo',
        'situacao',
        'data_hora',
    ];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function getDateTimeNotifyAttribute()
    {
        # Teste
        $date = new Date($this->attributes['data_hora']);
        return $date->format('d/m/Y H:i:s');
    }

    public function getDataOcorrenciaFormatedAttribute()
    {
        $date = new Date($this->attributes['data_ocorrencia']);
        return $date->format('d/m/Y');
    }

    public function getTitleAttribute($value)
    {
        return str_limit($value, 69, '...');
    }

    public function setDataHoraAttribute($data)
    {
        if (!is_null($data)) {
            $this->attributes['data_hora'] = dataHoraBRparaENG($data);
        }else{
            now()->format('Y-m-d H:i:s');
        }
    }

    // TODO: Criar Query Scopes para os models

}
