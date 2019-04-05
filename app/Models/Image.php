<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'partner_id'
    ];

    // Relacionamentos
    public function partner()
    {
        return $this->belongsTo(Socio::class);
    }

    public function urls()
    {
        return $this->hasMany(UrlImages::class);
    }
    // /Relacionamentos

    // Acessors
    public function getDateFormatedAttribute() // date_formated
    {
        $date = new Carbon($this->attributes['created_at']);

        return $date->format('d/m/Y');
    }
}
