<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\DropboxTrait;
use App\Jobs\ClearStorageFiles;
use App\Jobs\SendImageDropbox;
use App\Models\Image;
use App\Models\Socio;
use App\Models\UrlImages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImagesController extends Controller
{
    use DropboxTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $images = Image::simplePaginate();
        return view('admin.controle.imagens.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $partners = Socio::all();
        return view('admin.controle.imagens.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Houve um erro ao processar as imagens. " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
     */
    public function destroy($id)
    {
        try {
            UrlImages::where('image_id', $id)->delete();
            Image::find($id)->delete();
            return redirect()->back()->with('success', 'A imagem foi apagada com sucesso!');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível apagar esta imagem: ' . $exception->getMessage());
        }
    }

    public function search(Request $request)
    {
        $partner = Socio::where('nome', 'LIKE', "%{$request->search}%")->first();

        if (empty($partner)) {
            return redirect()->back()->with('error', 'Nenhum sócio encontrado');
        }
        $image = Image::where('partner_id', $partner->id)->paginate();
        return $image;
    }
}
