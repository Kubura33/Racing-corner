<?php

namespace App\Http\Controllers;

use App\Actions\UploadImages;
use App\Http\Requests\CreateAdRequest;
use App\Models\Ad;
use App\Models\Equipment;
use App\Models\EquipmentImages;
use App\Models\Image;
use App\Models\Part;
use App\Models\PartImages;
use App\Models\Vehicle;
use App\Models\VehicleImages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adsWithImages = Ad::with('advertisable.imageable', 'user')
            ->get()
            ->map(function ($ad) {
                $ad->load('advertisable.imageable');
                $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                    return $imageable->imagePath;
                })->toArray();
                unset($ad->advertisable->imageable);
                return $ad;
            });
        return Inertia::render('Home/Home',
            [
                'premiumAds' => $adsWithImages->where('home_page', 'da'),
                'ads' => $adsWithImages->sortByDesc('created_at')->take(3),
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Home/CreateAds');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdRequest $request)
    {
        $ad = Ad::create(
            [
                'user_id' => Auth::user() ? Auth::user()->id : 1,
                'advertisable_type' => $request->safe()->type,
                'title' => $request->safe()->name,
                'home_page' => $request->user()->role === 1 ? 'da' : 'ne',
                'price' => $request->safe()->price,
                'fixed' => $request->safe()->fixed,
                'lasts_until' => Carbon::now()->addMonth(),
            ]
        );

        switch ($request->safe()->type) {
            case 'vehicle':
                $vehicle = Vehicle::create([
                    'model' => $request->safe()->vehicle_model,
                    'engine_displacement' => $request->safe()->engine_displacement,
                    'vehicle_class' => $request->safe()->vehicle_class,
                    'year' => $request->safe()->year,
                    'description' => $request->safe()->description,
                    'discipline' => $request->safe()->discipline,

                ]);
                $ad->update(['advertisable_id' => $vehicle->id]);
                UploadImages::run('vehicle', $vehicle->id, $request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za vozilo je uspesno kreiran');
            case 'equipment':
                $eq = Equipment::create([
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,
                    'brand' => $request->safe()->brand,
                    'size' => $request->safe()->size,
                    'vrsta' => $request->safe()->vrsta,
                    'homologacija' => $request->safe()->homologacija,
                    'homologacija_info' => $request->safe()->homologacija_info,
                ]);
                $ad->update(['advertisable_id' => $eq->id]);
                UploadImages::run('equipment', $eq->id, $request->file('images'));

                return redirect()->route('home')->with('success', 'Oglas za opremu je uspesno kreiran');
            case 'parts':
                $part = Part::create([
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,


                ]);
                $ad->update(['advertisable_id' => $part->id]);
                UploadImages::run('parts', $part->id, $request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za delove je uspesno kreiran');
            case 'tires':
                $tires = Part::create([
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,
                    'dot' => $request->safe()->dot,
                    'dimensions' => $request->safe()->dimensions,
                    'manufacter' => $request->safe()->manufacter,
                    'number_of_tires' => $request->safe()->number_of_tires,
                    'type' => 'tires'
                ]);
                $ad->update(['advertisable_id' => $tires->id, 'advertisable_type' => 'parts']);
                UploadImages::run('parts', $tires->id, $request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za gume je uspesno kreiran');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //Could be changed to an object instead of instance using ->first();
        $adWithImages = $ad->load(['advertisable.imageable', 'user', 'likes']);

        $adWithImages->image_path = $adWithImages->advertisable->imageable->map(function ($imageable) {
            return $imageable->imagePath;
        })->toArray();

        return Inertia::render('Home/Details',
            [
                'ad' => $adWithImages,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        $ad->load('advertisable.imageable');
        foreach ($ad->advertisable->imageable as $imageable) {
            $imagePaths[] = $imageable->imagePath;
        }
        $ad['image_path'] = $imagePaths;
        return Inertia::render(
            'Home/EditAd',
            [
                'ad' => $ad
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $ad->update([
            'title' => $request->name,
            'price' => $request->price,
            'fixed' => $request->fixed,
        ]);
        if ($ad->advertisable_type === 'equipment') {

            $ad->advertisable->update([
                'description' => $request->description,
                'isNew' => $request->isNew,
                'brand' => $request->brand,
                'size' => $request->size,
                'homologacija' => $request->homologacija,
                'homologacija_info' => $request->homologacija_info,
            ]);
            $ad->save();
        } else if ($ad->advertisable_type === 'vehicle') {
            $ad->advertisable->update([
                'model' => $request->vehicle_model,
                'engine_displacement' => $request->engine_displacement,
                'year' => $request->year,
                'vehicle_class' => $request->vehicle_class,
                'description' => $request->description,
                'discipline' => $request->discipline,

            ]);
            $ad->save();
        } else if ($request->type === 'parts') {
            $ad->advertisable->update([
                'description' => $request->description,
                'isNew' => $request->isNew,
            ]);
        } else if ($request->type === 'tires') {
            $ad->advertisable->update([
                'manufacter' => $request->manufacter,
                'dot' => $request->dot,
                'dimensions' => $request->dimensions,
            ]);
        }
        return redirect()->back()->with('message', 'Oglas uspesno izmenjen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $images = Image::where('imageable_type', $ad->advertisable_type)
            ->where('imageable_id', $ad->advertisable_id)->get();
        foreach ($images as $image){
        Storage::disk('adImages')->delete(
            $image->imagePath);
        }

        Image::delete()->where('advertisable_type', $ad->advertisable_type)
            ->where('advertisable_id', $ad->advertisable_id);
        $ad->delete();
        return redirect()->back()->with('success', 'Oglas uspesno obrisan');
    }
}
