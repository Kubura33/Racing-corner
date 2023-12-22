<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class UploadImages
{
    use AsAction;

    public function handle($imageable_type , $imageable_id, $images, Request $request)
    {

        if (Image::where('imageable_type', $imageable_type)->where('imageable_id', $imageable_id)) {
            Storage::disk('adImages')->delete(Image::where('imageable_type', $imageable_type)
                ->where('imageable_id', $imageable_id)
                ->get()->imagePath);
            Image::delete()->where('imageable_type', $imageable_type)->where('imageable_id', $imageable_id);
        }
        foreach ($images as $image)
            Image::create([
                'imageable_type' => $imageable_type,
                'imageable_id' => $imageable_id,
                'image' => Storage::disk('adImages')->putFile($image)
            ]);
    }
}
