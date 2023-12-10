<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Enums\RoleEnums;
class AdminController extends Controller
{
    public function index(){
        return Inertia::render('Admin/Dashboard');
    }

    public function ads(){
        return Inertia::render('Admin/Ads');
    }
}
