<?php

namespace App\Models;

use App\Http\Traits\DropboxTrait;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UrlImages
 *
 * @property int $id
 * @property int $image_id
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $date_created_formated
 * @property-read mixed $link_dropbox
 * @property-read mixed $thumbnail_dropbox
 * @method static Builder|UrlImages newModelQuery()
 * @method static Builder|UrlImages newQuery()
 * @method static Builder|UrlImages query()
 * @method static Builder|UrlImages whereCreatedAt($value)
 * @method static Builder|UrlImages whereFile($value)
 * @method static Builder|UrlImages whereId($value)
 * @method static Builder|UrlImages whereImageId($value)
 * @method static Builder|UrlImages whereUpdatedAt($value)
 * @mixin Eloquent
 */
class UrlImages extends Model
{
    use DropboxTrait;
    protected $fillable = [
        'image_id',
        'file'
    ];


    // Acessors
    public function getThumbnailDropboxAttribute() // thumbnail_dropbox
    {
        $dropbox = $this->connectDropbox();
        //Available sizes: 'thumb', 'small', 'medium', 'large', 'huge'
        $size = 'large'; //Default size

        //Available formats: 'jpeg', 'png'
        $format = 'jpeg'; //Default format

        $file = $dropbox->getThumbnail($this->attributes['file'], $size, $format);

        //Get File Contents
        $contents = $file->getContents();
        $name = str_random(9);
        file_put_contents(public_path() . "/images/thumbnails/" . $name . ".jpg", $contents);

        $path = "/images/thumbnails/" . $name . ".jpg";
        return $path;
    }

    public function getLinkDropboxAttribute() // link_dropbox
    {
        $dropbox = $this->connectDropbox();
        $temporaryLink = $dropbox->getTemporaryLink($this->attributes['file']);

//Get File Metadata
        $file = $temporaryLink->getMetadata();

//Get Link
        return $temporaryLink->getLink();
    }

    public function getDateCreatedFormatedAttribute() // date_created_formated
    {
        $date = new Carbon($this->attributes['created_at']);
        return $date->format('d/m/Y');
    }
}
