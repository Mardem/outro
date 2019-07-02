<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class SociosCheque extends Model
{
    use SoftDeletes;

    protected $table = 'socios_cheque';

    const ORIGEM = [
        'ITIQUIRA' => 0,
        'SOLUCAO' => 1,
    ];

    const BANCO = [
        'BANCO_DO_BRASIL' => 0,
        'BRADESCO' => 1,
        'BRB' => 2,
        'CAIXA' => 3,
        'HSBC' => 4,
        'ITAU' => 5,
        'MERCANTIL_DO_BRASIL' => 6,
        'SANTANDER' => 7,
        'SICOOB' => 8,
        'OUTROS' => 9,
        'BANCO REAL' => 10,
        'BANESTES' => 11,
    ];

    protected $fillable = [
        'id',
        'origem',
        'emitente',
        'cpf_cnpj',
        'banco',
        'numero_cheque',
        'quantidade_cheque',
        'valor_unitario',
        'valor_total',
        'vencimento',
        'titulo',
        'titular',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'email',
        'telefone',
        'observacao',
        'situacao',
        'user_id'
    ];

    # ---------------- Relacionamentos ----------------

    // public function gerenciamentos()
    // {
    //     return $this->hasMany(Gerenciamento::class);
    // }

    public function operador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    # ---------------- Accessor ----------------

    // public function getDataDesignacaoFormatedAttribute() // data_designacao_formated
    // {
    //     if (empty($this->attributes['designado'])) {
    //         return "<i class='text-danger'>Não registrado</i>";
    //     }

    //     $date = new Date($this->attributes['designado']);
    //     return $date->format('d/m/Y');
    // }

    public function getVencimentoFormatedAttribute() // vencimento_formated
    {
        if (empty($this->attributes['vencimento'])) {
            return "<i class='text-danger'>Não registrado</i>";
        }

        $date = new Date($this->attributes['vencimento']);
        return $date->format('d/m/Y');
    }

    public function getSituacaoFormatedAttribute() // situacao_formated
    {
        if($this->attributes['situacao'] == 0) {
            return "<b class='text-success'>Ativo</b>";
        } else {
            return "<b class='text-danger'>Inativo</b>";
        }
    }

    # ---------------- Scopes ----------------

    public function scopeAdmin($query, $user)
    {
        if ($user->category === User::CATEGORY['ADMINISTRATOR'])
            return $query->orderBy('id', 'desc');

        return $query->orderBy('id', 'desc')->where('user_id', $user->id);
    }
}
