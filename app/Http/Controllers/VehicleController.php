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
        if (isset($filters['disciplines'])) {
            $selectedKeys = array_keys(array_filter($filters['disciplines'], function ($value) {
                return $value === "true";
            }));
        }

        // Apply filters, scopes, and pagination directly on the query builder
        $adsQuery = Ad::with('user')
            ->where('advertisable_type', 'vehicle')
            ->filter($filters)
            ->discipline($selectedKeys)
            ->orderByDesc('created_at');

        // Apply pagination
        $adsPaginated = $adsQuery->paginate(9)->withQueryString();

        // Process each paginated item for additional data
        $adsWithImages = $adsPaginated->getCollection()->map(function ($ad) {
            $ad->load('advertisable.imageable');
            $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                return $imageable->imagePath;
            })->toArray();

            unset($ad->advertisable->imageable);
            return $ad;
        });

        // Since we're manipulating the collection after pagination, filter premium ads now
        $premiumAds = $adsWithImages->filter(function ($ad) {
            return $ad->home_page === 'da';
        });

        // Replace the original collection in the paginator
        $adsPaginated->setCollection($adsWithImages);

        return Inertia::render('Home/Cars', [
            'premiumAds' => $premiumAds,
            'ads' => $adsPaginated
        ]);
    }

}
