<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gerenciamento()
    {
        return $this->belongsTo(Gerenciamento::class);
    }
}
