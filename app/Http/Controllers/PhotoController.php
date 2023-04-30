<?php

namespace App\Http\Controllers;

use App\Http\Services\PhotoService;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // Private vars
    private $photoService;

    // Constructor
    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('photo')){
            return $this->photoService->uploadImage($request->file('photo'));
        }
    }

    public function removeImage(Request $request, $id)
    {
        $data = $request->json()->all();
        if(isset($data['photo'])){
            return $this->photoService->removeImage($data['photo']);
        }

        return response()->json(['success' => false, 'message' => 'Arquivo não encontrado']);
    }
}
