<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use Monolog\Logger;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class UploadImages
{
    use AsAction;

    public function handle($imageable_type , $imageable_id, $images)
    {
        $optimizerChain = OptimizerChainFactory::create();

        foreach ($images as $image){
           $createdImage = Image::create([
                'imageable_type' => $imageable_type,
                'imageable_id' => $imageable_id,
                'image' => Storage::disk('adImages')->putFile($image)
            ]);
           $pathBefore = Storage::disk('adImages')->path($createdImage->image);
           $optimizedPath = $optimizerChain->optimize(Storage::disk('adImages')->path($createdImage->image));
           \Log::info("BEFORE : " . $pathBefore);
           \Log::info("AFTER: " . $optimizedPath);
        }
    }
}
