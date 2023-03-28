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

    public function saveImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            return $this->photoService->uploadImage($request->file('photo'));
        }
    }

    public function removeImage(Request $photoName)
    {
        $data = json_decode($photoName->getContent(), true);

        if ($data['photo_original'] != $data['photoName']) {

            $photoPath = strval($data['photoName']);

            if ($photoPath != null) {

                return $this->photoService->removeImage($photoPath);
            }
        }

        if ($data['photo_original'] != null) {
            return redirect()->route('usuarios.index');
        }

        return response()->json(['success' => false, 'message' => 'Arquivo não encontrado']);
    }
}
