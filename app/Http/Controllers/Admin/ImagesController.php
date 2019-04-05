<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\DropboxTrait;
use App\Jobs\ClearStorageFiles;
use App\Jobs\SendImageDropbox;
use App\Models\Image;
use App\Models\Socio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    use DropboxTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('admin.controle.imagens.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Socio::all();
        return view('admin.controle.imagens.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('images');
        try {
            $image = Image::create($request->all());
            if ($images) {
                foreach ($images as $file) {

                    $name = str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move(storage_path() . '/files/', $name);
                    $data[] = $name;

                    $completeFilePath = storage_path() . '/files/' . $name;

                    SendImageDropbox::withChain([
                        new ClearStorageFiles($completeFilePath)
                    ])->dispatch($name, $image->id);
                }
            }
            return redirect()->back()->with('success', 'As imagens foram inseridas com sucesso, aguarde o processamento.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Houve um erro ao processar as imagens. " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::findOrFail($id);
        $urls  = $image->urls;
        return view('admin.controle.imagens.view', compact('image', 'urls'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
