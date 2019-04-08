<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Sms
 *
 * @property int $id
 * @property string $message
 * @property string $phone
 * @property int $type
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms newQuery()
 * @method static Builder|Sms onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereUpdatedAt($value)
 * @method static Builder|Sms withTrashed()
 * @method static Builder|Sms withoutTrashed()
 * @mixin Eloquent
 */
class Sms extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];
}
