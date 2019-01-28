<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Socio extends Model
{
    use SoftDeletes;

    protected $appends = ['data_designacao_formated'];

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
        'observacao'
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
        if (empty($this->attributes['designado'])) {
            return "<i class='text-danger'>Não registrado</i>";
        }

        $date = new Date($this->attributes['designado']);
        return $date->format('d/m/Y');
    }

    public function getSituacaoFormatedAttribute()
    {
        if($this->attributes['situacao'] == 0) {
            return "<b class='text-success'>Ativo</b>";
        } else {
            return "<b class='text-danger'>Inativo</b>";
        }
    }
}
