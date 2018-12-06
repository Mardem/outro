<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function gerenciamentos()
    {
        return $this->hasMany(Gerenciamento::class);
    }
}
