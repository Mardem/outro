<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
