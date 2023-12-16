<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Part;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TiresController extends Controller
{
    public function __invoke(Request $request){
        $filters = $request->only(['priceFrom', 'priceTo', 'disciplines']);
        $selectedKeys = [];
        if(isset($filters['disciplines'])){
        $selectedKeys = array_keys(array_filter($filters['disciplines'], function ($value) {
            return $value === "true";
        }));
        }


        $adsWithImages = Ad::with('user', 'advertisable')
            ->where('advertisable_type', 'parts')->filter($filters)->manufacter($selectedKeys)
            ->paginate(10)->withQueryString()
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
           // dd($adsWithImages);
        return Inertia::render(
            'Home/TiresPage',
            [
                'ads' => $adsWithImages,
                'filters' => $filters,
            ]
        );
    }

}
