<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Helper
{
    public static function uploadImage(
        Request $request,
        String $filename,
        String $path = 'public/products'
    )
    {
        // making directory if not exists
        // $path = '/public/products';
        Storage::exists($path) or Storage::makeDirectory($path);

        // uploading thumbnail image and return path
        $file = $request->file($filename);
        $path = $file->hashName($path);
        // $path = $file->hashName('public/products/thumb');
        $image = Image::make($file);
        Storage::put($path, (string) $image->encode());
        $url = Storage::url($path);
        return $url;
    }

    public static function uploadThumb(
        Request $request,
        String $filename,
        String $path = 'public/products/thumb',
        int $fitSize = 300
    )
    {
        // making directory if not exists
        // $path = '/public/products/thumb';
        Storage::exists($path) or Storage::makeDirectory($path);

        // uploading thumbnail image and return path
        $file = $request->file($filename);
        $path = $file->hashName($path);
        // $path = $file->hashName('public/products/thumb');
        $image = Image::make($file)->fit($fitSize);
        Storage::put($path, (string) $image->encode());
        $url = Storage::url($path);
        return $url;
    }
}
