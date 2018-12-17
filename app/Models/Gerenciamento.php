<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Gerenciamento extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id',
        'dataContato'
    ];

    protected $hidden = ['socio_id', 'situacao', 'data_hora', 'deleted_at', 'created_at', 'updated_at'];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function getDataHoraFormatedAttribute()
    {
        $date = new Date($this->attributes['data_hora']);
        return $date->format('d/m/Y H:i:s');
    }
}
