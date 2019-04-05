<?php

namespace App\Http\Traits;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

trait DropboxTrait
{
    public function connectDropbox()
    {
        $app = new DropboxApp(config('dropbox.appKey'), config('dropbox.appSecret'), config('dropbox.access_token'));
        $dropbox = new Dropbox($app);
        return $dropbox;
    }
}