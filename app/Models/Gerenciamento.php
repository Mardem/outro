<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

/**
 * App\Models\Gerenciamento
 *
 * @property int $id
 * @property int $socio_id
 * @property int|null $operador_id
 * @property string|null $data_ocorrencia
 * @property string|null $titulo
 * @property string|null $situacao
 * @property string|null $data_hora
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $data_ocorrencia_formated
 * @property-read mixed $date_time_notify
 * @property-read mixed $title
 * @property-read Socio $socio
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento newQuery()
 * @method static Builder|Gerenciamento onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereDataHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereDataOcorrencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereOperadorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereSituacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereSocioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gerenciamento whereUpdatedAt($value)
 * @method static Builder|Gerenciamento withTrashed()
 * @method static Builder|Gerenciamento withoutTrashed()
 * @mixin Eloquent
 */
class Gerenciamento extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'socio_id',
        'situacao',
        'data_hora',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'socio_id',
        'operador_id',
        'data_ocorrencia',
        'titulo',
        'situacao',
        'data_hora',
    ];

    # ---------------- Relacionamentos ----------------

    public function messages()
    {
        return $this->hasMany(Message::class, 'ocorrencia_id');
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    # ---------------- Accessor ----------------
    public function getDateTimeNotifyAttribute() // date_time_notify
    {
        $date = new Date($this->attributes['data_hora']);
        return $date->format('d/m/Y H:i:s');
    }

    public function getDataOcorrenciaFormatedAttribute() // data_ocorrencia_formated
    {
        $date = new Date($this->attributes['data_ocorrencia']);
        return $date->format('d/m/Y');
    }


    public function getTitleAttribute($value)
    {
        return str_limit($value, 69, '...');
    }

    # ---------------- Mutator ----------------

    public function setDataHoraAttribute($data)
    {
        if (!is_null($data)) {
            $this->attributes['data_hora'] = dataHoraBRparaENG($data);
        }else{
            now()->format('Y-m-d H:i:s');
        }
    }

    # ---------------- Scopes ----------------

    public function scopeProfile($query, $profile)
    {
        if($profile == 1)
            return $query;

        return $query->where('operador_id', \Auth::user()->id)->count();
    }
}
