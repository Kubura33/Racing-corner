<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TiresController extends Controller
{
    public function __invoke(){
        $adsWithImages = Ad::with('user')
            ->where('advertisable_type', 'parts')
            ->get()
            ->map(function ($ad) {
                // Eager load only the necessary relationships
                if($ad->advertisable->type ==='tires'){
                $ad->load('advertisable.imageable');

                // Map the image paths
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();

                // Unset the unnecessary relation
                unset($ad->advertisable->imageable);

                return $ad;}
                return null;
            })->filter();
        return Inertia::render(
            'Home/TiresPage',
            [
                'ads' => $adsWithImages
            ]
        );
    }

}
