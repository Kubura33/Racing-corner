<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Part;
use App\Services\CustomPaginator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TiresController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'disciplines', 'search']);
        $selectedKeys = [];

        if (isset($filters['disciplines'])) {
            $selectedKeys = array_keys(array_filter($filters['disciplines'], function ($value) {
                return $value === "true";
            }));
        }

        $adsQuery = Ad::with(['user', 'advertisable'])
            ->where('advertisable_type', 'parts')
            ->filter($filters)
            ->manufacter($selectedKeys)
            ->orderByDesc('created_at');

        $adsPaginated = $adsQuery->paginate(9)->withQueryString();
        $adsWithImages = $adsPaginated->getCollection()->map(function ($ad) {
            if ($ad->advertisable && $ad->advertisable->type === 'tires') {
                $ad->load('advertisable.imageable');
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();
                unset($ad->advertisable->imageable);
                return $ad;
            }
            return null;
        })->filter();

        $adsPaginated->setCollection($adsWithImages);

        return Inertia::render('Home/TiresPage', [
            'ads' => $adsPaginated,
            'filters' => $filters,
        ]);
    }


}
