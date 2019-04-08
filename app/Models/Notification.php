<?php

namespace App\Models;

use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

/**
 * App\Models\Notification
 *
 * @property int $id
 * @property int $user_id
 * @property int $gerenciamento_id
 * @property int $socio_id
 * @property string|null $day_contact
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Gerenciamento $gerenciamento
 * @property-read mixed $day_contact_formated
 * @property-read Socio $socio
 * @property-read User $user
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification whereCreatedAt($value)
 * @method static Builder|Notification whereDayContact($value)
 * @method static Builder|Notification whereGerenciamentoId($value)
 * @method static Builder|Notification whereId($value)
 * @method static Builder|Notification whereSocioId($value)
 * @method static Builder|Notification whereStatus($value)
 * @method static Builder|Notification whereUpdatedAt($value)
 * @method static Builder|Notification whereUserId($value)
 * @mixin Eloquent
 */
class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'gerenciamento_id',
        'socio_id',
        'day_contact'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function gerenciamento()
    {
        return $this->belongsTo(Gerenciamento::class);
    }

    public function getDayContactFormatedAttribute()
    {
        $contact = $this->attributes['day_contact'];
        if($contact != null) {
            $date = new Date($contact);

            return $date->format('d/m/Y H:i:s');
        }
        return null;
    }
}
