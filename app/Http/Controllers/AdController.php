<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdRequest;
use App\Models\Ad;
use App\Models\Equipment;
use App\Models\Part;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'user_id' => Auth::user()->id,
                'slug' => $request->safe()->slug,
                'advertisable_type' => $request->safe()->type,
                'price' => $request->safe()->price,
                'lasts_until' => Carbon::now()->addMonth(),
            ]
        );
        switch ($request->safe()->type) {
            case 'vehicle':
                $vehicle = Vehicle::create([
                    'model' => $request->safe()->vehicle_class,
                    'engine_displacement' => $request->safe()->engine_displacement,
                    'vehicle_class' => $request->safe()->vehicle_class,
                    'description' => $request->safe()->description,
                    'discipline' => $request->safe()->discipline,

                ]);
                $ad->update(['advertisable_id' => $vehicle->id]);
                return redirect()->route('home')->with('success', 'Oglas za vozilo je uspesno kreiran');
            case 'equipment':
                $eq = Equipment::create([
                    'name' => 'Random name',
                    'description' => $request->safe()->description,
                ]);
                $ad->update(['advertisable_id' => $eq->id]);

                return redirect()->route('home')->with('success', 'Oglas za opremu je uspesno kreiran');
            case 'parts':
                $part = Part::create([
                    'name' => 'Random name',
                    'description' => $request->safe()->description,
                ]);
                $ad->update(['advertisable_id' => $part->id]);
                return redirect()->route('home')->with('success', 'Oglas za delove je uspesno kreiran');
            case 'tires':
                $tires = Part::create([
                    'name' => 'Random name',
                    'description' => $request->safe()->description,
                    'type' => 'tires'
                ]);
                $ad->update(['advertisable_id' => $tires->id]);
                return redirect()->route('home')->with('success', 'Oglas za gume je uspesno kreiran');


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
