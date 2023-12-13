<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleController extends Controller
{
    public function __invoke()
    {

        $adsWithImages = Ad::with('user')
            ->where('advertisable_type', 'vehicle')
            ->get()
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
            'ads' => $adsWithImages->where('home_page', 'ne'),

        ]);
    }
}
