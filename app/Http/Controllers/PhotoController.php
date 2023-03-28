<?php

namespace App\Http\Controllers;

use App\Http\Services\PhotoService;
use App\Models\User;
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
        // $photoName->only('photoName');
        $photoPath = strval($data['photoName']);
        // return response()->json(['teste' => $photoPath]);
        if ($photoPath != null) {
            // return response()->json(['if' => $photoPath]);
            return $this->photoService->removeImage($photoPath);
        }

        return response()->json(['success' => false, 'message' => 'Arquivo não encontrado']);
    }
}
