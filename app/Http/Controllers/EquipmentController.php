<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Services\CustomPaginator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->only(['priceFrom', 'priceTo', 'vrsta', 'size', 'search']);
        $selectedVrsta = [];
        $selectedSize = [];

        if (isset($filters['vrsta'])) {
            $selectedVrsta = array_keys(array_filter($filters['vrsta'], function ($value) {
                return $value === "true";
            }));
        }

        if (isset($filters['size'])) {
            $selectedSize = array_keys(array_filter($filters['size'], function ($value) {
                return $value === "true";
            }));
        }

        $adsQuery = Ad::with('user')
            ->where('advertisable_type', 'equipment')
            ->filter($filters)
            ->vrsta($selectedVrsta)
            ->equipmentSize($selectedSize)
            ->orderByDesc('created_at');

        $adsPaginated = $adsQuery->paginate(9)->withQueryString();

        $adsWithImages = $adsPaginated->getCollection()->map(function ($ad) {
            $ad->load('advertisable.imageable');
            $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                return $imageable->imagePath;
            })->toArray();

            unset($ad->advertisable->imageable);
            return $ad;
        });

        // Replace the original collection in the paginator
        $adsPaginated->setCollection($adsWithImages);

        return Inertia::render('Home/EquipmentPage', [
            'ads' => $adsPaginated,
            'filters' => $filters,
        ]);
    }

}
