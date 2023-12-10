<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnums;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Testing\Assert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', RoleEnums::Admin)->get();
        return Inertia::render('Admin/Users',
            [
                'users' => $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return Inertia::render('Admin/UserEdit',
        [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Korisnik uspesno obrisan');
    }
}
