<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Socio extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'titulo',
        'tipo',
        'nome',
        'cpf_cnpj',
        'rg',
        'email',
        'operador_id',
        'telefone',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'designado',
        'cidade',
        'uf',
        'user_id',
        'valor',
    ];

    public function gerenciamentos()
    {
        return $this->hasMany(Gerenciamento::class);
    }

    public function operador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDataDesignacaoFormatedAttribute()
    {
        $date = new Date($this->attributes['designado']);
        return $date->format('d/m/Y');
    }
}
