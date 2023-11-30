<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartsController extends Controller
{
    public function __invoke(){
        $ads = Ad::with('advertisable.imageable')->where('advertisable_type', 'parts')->get();
        $adsWithImages = $ads->map(function ($ad) {
            // Eager load only the necessary relationships
            $ad->load('advertisable.imageable');

            // Map the image paths
            $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                return $imageable->imagePath;
            })->toArray();

            // Unset the unnecessary relation
            unset($ad->advertisable->imageable);

            return $ad;
        });
        return Inertia::render(
            'Home/PartsPage',
            [
                'ads' => $adsWithImages
            ]
        );
    }
}
