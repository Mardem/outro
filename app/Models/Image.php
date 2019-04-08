<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $partner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $date_formated
 * @property-read Socio $partner
 * @property-read Collection|UrlImages[] $urls
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image query()
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image wherePartnerId($value)
 * @method static Builder|Image whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Image extends Model
{
    protected $fillable = [
        'partner_id'
    ];

    // Relacionamentos
    public function partner()
    {
        return $this->belongsTo(Socio::class);
    }

    public function urls()
    {
        return $this->hasMany(UrlImages::class);
    }
    // /Relacionamentos

    // Acessors
    public function getDateFormatedAttribute() // date_formated
    {
        $date = new Carbon($this->attributes['created_at']);

        return $date->format('d/m/Y');
    }
}
