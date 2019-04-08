<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $ocorrencia_id
 * @property string $mensagem
 * @property string $responsavel
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static Builder|Message onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMensagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereOcorrenciaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereResponsavel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static Builder|Message withTrashed()
 * @method static Builder|Message withoutTrashed()
 * @mixin Eloquent
 */
class Message extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ocorrencia_id',
        'mensagem',
        'responsavel'
    ];
}
