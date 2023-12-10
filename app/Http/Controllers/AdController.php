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

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Home/Home');
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
                    'description' => $request->safe()->description,
                    'discipline' => $request->safe()->discipline,

                ]);
                $ad->update(['advertisable_id' => $vehicle->id]);
                UploadImages::run('vehicle', $vehicle->id,$request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za vozilo je uspesno kreiran');
            case 'equipment':
                $eq = Equipment::create([
                    'name' => $request->safe()->name,
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,
                    'brand' => $request->safe()->brand,
                    'size' => $request->safe()->size,
                    'homologacija' => $request->safe()->homologacija,
                    'homologacija_info' => $request->safe()->homologacija_info,
                ]);
                $ad->update(['advertisable_id' => $eq->id]);
                UploadImages::run('equipment', $eq->id,$request->file('images'));

                return redirect()->route('home')->with('success', 'Oglas za opremu je uspesno kreiran');
            case 'parts':
                $part = Part::create([
                    'name' => $request->safe()->name,
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,


                ]);
                $ad->update(['advertisable_id' => $part->id]);
                UploadImages::run('parts', $part->id,$request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za delove je uspesno kreiran');
            case 'tires':
                $tires = Part::create([
                    'name' => $request->safe()->name,
                    'description' => $request->safe()->description,
                    'isNew' => $request->safe()->isNew,
                    'dot' => $request->safe()->dot,
                    'dimensions' => $request->safe()->dimensions,
                    'manufacter' => $request->safe()->manufacter,
                    'type' => 'tires'
                ]);
                $ad->update(['advertisable_id' => $tires->id, 'advertisable_type' => 'parts']);
                UploadImages::run('parts', $tires->id,$request->file('images'));
                return redirect()->route('home')->with('success', 'Oglas za gume je uspesno kreiran');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {

        //Could be changed to an object instead of instance using ->first();
        $ad = $ad->with(['advertisable.imageable','user'])->get();

        $adsWithImages = $ad->map(function ($ad){
            $ad->image_path = $ad->advertisable->imageable->map(function ($imageable) {
                return $imageable->imagePath;
            })->toArray();
            return $ad;
        });
        return Inertia::render('Home/Details',
        [
            'ad' => $adsWithImages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $id)
    {
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
