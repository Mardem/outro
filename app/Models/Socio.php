<?php

namespace App\Models;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

/**
 * App\Models\Socio
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $tipo
 * @property string $nome
 * @property string $cpf_cnpj
 * @property string|null $rg
 * @property string|null $email
 * @property int $user_id
 * @property string|null $telefone
 * @property string|null $endereco
 * @property int|null $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $uf
 * @property string|null $designado
 * @property string|null $valor
 * @property string|null $fone1
 * @property string|null $fone2
 * @property string|null $fone3
 * @property string|null $fone4
 * @property string|null $fone5
 * @property string|null $fone6
 * @property string|null $fone7
 * @property string|null $fone8
 * @property string|null $fone9
 * @property string|null $fone10
 * @property string|null $fone11
 * @property string|null $fone12
 * @property string|null $fone13
 * @property string|null $fone14
 * @property string|null $data_nascimento
 * @property string|null $type
 * @property string|null $observacao
 * @property int $situacao
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Gerenciamento[] $gerenciamentos
 * @property-read mixed $data_designacao_formated
 * @property-read mixed $situacao_formated
 * @property-read User $operador
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Socio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Socio newQuery()
 * @method static Builder|Socio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Socio query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereComplemento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereCpfCnpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereDataNascimento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereDesignado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereFone9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereRg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereSituacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Socio whereValor($value)
 * @method static Builder|Socio withTrashed()
 * @method static Builder|Socio withoutTrashed()
 * @mixin Eloquent
 */
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

    public function scopeAdmin($query, $user)
    {
        if($user->category === User::CATEGORY['ADMINISTRATOR'])
            return $query->orderBy('id', 'desc');

        return $query->orderBy('id', 'desc')->where('user_id', $user->id);
    }
}
