<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Testing\Assert;

class FollowedAdvertisementsController extends Controller
{
    public function __invoke(Request $request)
    {
        $ads = $request->user()->likes->load(['advertisable', 'user']);
        return Inertia::render('Profile/UserFollowedAdverts',
        [
            'ads' => $ads
        ]);
    }
}
