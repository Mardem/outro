<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'gerenciamento_id',
        'socio_id',
        'day_contact'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function gerenciamento()
    {
        return $this->belongsTo(Gerenciamento::class);
    }

    public function getDayContactFormatedAttribute()
    {
        $contact = $this->attributes['day_contact'];
        if($contact != null) {
            $date = new Date($contact);

            return $date->format('d/m/Y H:i:s');
        }
        return null;
    }
}
