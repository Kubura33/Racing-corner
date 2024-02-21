<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Services\CustomPaginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Inertia\Inertia;

class PartsController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'search']);

        $adsQuery = Ad::with('user')
            ->where('advertisable_type', 'parts')
            ->filter($filters)
            ->orderByDesc('created_at');

        $adsPaginated = $adsQuery->paginate(9)->withQueryString();


        $adsWithImages = $adsPaginated->getCollection()->map(function ($ad) {
            $ad->load('advertisable.imageable');

            if ($ad->advertisable->type === 'other') {
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();

                unset($ad->advertisable->imageable);
            }

            return $ad;
        });
        $adsPaginated->setCollection($adsWithImages);

        return Inertia::render('Home/PartsPage', [
            'ads' => $adsPaginated,
            'filter' => $filters,
        ]);
    }

}
