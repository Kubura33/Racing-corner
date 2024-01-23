<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->only('search');
        $adsWithImages = Ad::with('advertisable.imageable', 'user')
            ->filter($search)
            ->get()
            ->map(function ($ad) {
                $ad->load('advertisable.imageable');
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();
                unset($ad->advertisable->imageable);
                return $ad;
            });
        return Inertia::render(
            'Home/SearchedAds',
            [
                'ads' => $adsWithImages,
                'search' => $search
            ]
        );
    }
}
