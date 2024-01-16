<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CreatedAdvertisementsController extends Controller
{
    public function __invoke(Request $request)
    {
        $ads = $request->user()->ads->load(['advertisable.imageable','likes']);
        foreach ($ads as $ad) {
            $ad->image_path = $ad->advertisable->imageable->first()->imagePath;
            $ad->advertisable->unsetRelation('imageable');
        }
        return Inertia::render(
            'Profile/UserAdverts',
            ['ads' => $ads
            ]
        );
    }
}
