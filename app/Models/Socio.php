<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
