<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\File;

class PhotoService
{
    public function uploadImage($photo)
    {
        if (isset($photo)) {
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/images'), $photoName);
            return response()->json(['success' => $photoName]);
        }

        return response('ERRO', 403);
    }

    public function saveImage($photo)
    {
        if (isset($photo)) {
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/images'), $photoName);
            return asset('storage/images/' . $photoName);
        } else {
            return asset('img/user.svg');
        }
    }

    public function removeImage($photoName)
    {

        $photoPath = public_path('storage/images/' . $photoName); // obter o caminho completo do arquivo

        if (file_exists($photoPath)) {
            File::delete($photoPath); // excluir o arquivo
            return response()->json(['success' => 'arquivo removido']);
        } else {
            return response()->json(['success' => false, 'message' => 'Arquivo não encontrado']);
        }
    }
}
