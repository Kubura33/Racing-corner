<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class UploadImages
{
    use AsAction;

    public function handle($imageable_type, $imageable_id, $images)
    {
        foreach($images as $image)
        Image::create([
            'imageable_type' => $imageable_type,
            'imageable_id' => $imageable_id,
            'image' => Storage::disk('adImages')->putFile($image)
        ]);
    }
}
