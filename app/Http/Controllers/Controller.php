<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Hanya gambar biasa (tanpa SVG, karena SVG bisa berisi script), maksimal 2 MB
    protected const ATURAN_FOTO = 'image|mimes:jpg,jpeg,png,webp|max:2048';

    // Simpan foto ke public/images/<folder> dengan nama acak, lalu kembalikan nama filenya
    protected function simpanFoto(UploadedFile $file, string $folder): string
    {
        $nama = $file->hashName();
        $file->move(public_path('images/'.$folder), $nama);

        return $nama;
    }
}
