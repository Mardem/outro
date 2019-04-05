<?php

namespace App\Jobs;

use App\Http\Traits\DropboxTrait;
use App\Models\UrlImages;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Kunnu\Dropbox\DropboxFile;
use Kunnu\Dropbox\Exceptions\DropboxClientException;

class SendImageDropbox implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, DropboxTrait;

    protected $name;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $id)
    {
        if (is_string($name))
            $this->name = $name;
        if (is_int($id))
            $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $folder = "imagens";
        $file = storage_path() . "/files/" . $this->name;
        $completePath = "/$folder/" . $this->name;

        // Realiza a conexão ao dropbox e prepara a instância
        $dropbox = $this->connectDropbox();

        try {
            // Tenta criar a pasta
            $dropbox->createFolder("/" . $folder);
        } catch (DropboxClientException $clientException) {
            // Trata o erro e manda para o log
            \Log::info($clientException->getMessage() . " | " . $clientException->getCode());
        }
        // Busca a imagem baseada no local e realiza o upload da imagem
        $dropboxFile = new DropboxFile($file);
        $dropbox->upload($dropboxFile, $completePath, ['autorename' => true]);

        $this->createRelationship($this->id, $completePath);
    }

    private function createRelationship($id, $file)
    {
        $url = new UrlImages;
        $url->image_id = $id;
        $url->file = $file;
        $url->save();
    }
}
