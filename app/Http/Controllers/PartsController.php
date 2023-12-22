<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartsController extends Controller
{
    public function __invoke(Request $request){
        $filters = $request->only(['priceFrom', 'priceTo', 'search']);
        $ads = Ad::with('user')->where('advertisable_type', 'parts')->filter($filters)->paginate(10)->withQueryString();
        $adsWithImages = $ads->map(function ($ad) {
            // Eager load only the necessary relationships
            $ad->load('advertisable.imageable');

            // Map the image paths
            if($ad->advertisable->type === 'other'){
            $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                return $imageable->imagePath;
            })->toArray();

            // Unset the unnecessary relation
            unset($ad->advertisable->imageable);

            return $ad;}
            return null;
        })->filter();
        return Inertia::render(
            'Home/PartsPage',
            [
                'ads' => $adsWithImages,
                'filter' => $filters,
            ]
        );
    }
}
