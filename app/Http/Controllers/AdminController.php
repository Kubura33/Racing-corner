<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Enums\RoleEnums;
class AdminController extends Controller
{
    public function index(){
        return Inertia::render('Admin/Dashboard',
        [
            'numberOfUsers' => count(User::all()),
            'numberOfAds' => count(Ad::all()),
            'numberOfPremiumUsers' => count(User::where('role', RoleEnums::Premium->value)->get()),

        ]);
    }

    public function ads(){
        $ads = Ad::with('advertisable')->get();
        return Inertia::render('Admin/Ads',
        [
            'ads' => $ads
        ]);
    }
}
