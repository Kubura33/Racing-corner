<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentController extends Controller
{
    public function __invoke(){
        $adsWithImages = Ad::with( 'user')
            ->where('advertisable_type', 'equipment')
            ->get()
            ->map(function ($ad) {
                $ad->load('advertisable.imageable');
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();
                unset($ad->advertisable->imageable);
                return $ad;
            });

        return Inertia::render('Home/EquipmentPage',
        [
            'ads' => $adsWithImages
        ]);
    }
}
