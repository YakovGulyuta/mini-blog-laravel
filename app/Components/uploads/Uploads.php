<?php

namespace App\Components\uploads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Uploads extends Model
{


    public static function uploadImage($request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }
        return asset("public/{$this->thumbnail}");
    }
}
