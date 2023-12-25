<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Services\CustomPaginator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'disciplines', 'search']);
        $selectedKeys = [];
        if(isset($filters['disciplines'])){
            $selectedKeys = array_keys(array_filter($filters['disciplines'], function ($value) {
                return $value === "true";
            }));
        }
        $adsWithImages = Ad::with('user')
            ->where('advertisable_type', 'vehicle')
            ->filter($filters)
            ->discipline($selectedKeys)->get()
            ->map(function ($ad) {
                $ad->load('advertisable.imageable');
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();
                unset($ad->advertisable->imageable);
                return $ad;
            });

        return Inertia::render('Home/Cars',
        [
            'premiumAds' => $adsWithImages->where('home_page', 'da'),
            'ads' => CustomPaginator::paginate($adsWithImages, 10)->withQueryString()

        ]);
    }
}
