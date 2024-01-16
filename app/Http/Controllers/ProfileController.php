<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Rules\PhoneRule;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(Request $request){
        return Inertia::render('Profile/UserHome',
        [
            'ads' => $request->user()->ads->load(['advertisable', 'likes']),
            'user' => $request->user()->load('likes'),
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/UserSettings', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $request->user()->load('userSetting'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate(
            [

                'name' => ['required'],
                'lastname' => ['required'],
                'username' => ['required', Rule::unique('users')->ignore(auth()->id())],
                'phone' => ['required', new PhoneRule(), Rule::unique('users')->ignore(auth()->id())],
                'followNotifications' => ['required'],
                'emailNotifications' => ['required'],
                'websiteNotifications' => ['required'],
            ]
        );
        $user->update(
            [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'phone' => $request->phone,
            ]
        );
        $user->userSetting->update(
            [
                'receive_follow_notifications' => $request->followNotifications ? 1 : 0,
                'receive_notifications_via_email' => $request->emailNotifications ? 1 : 0,
                'receive_notifications_via_website' => $request->websiteNotifications ? 1 : 0
            ]
        );
        $user->save();

        return redirect()->route('home')->with('success', 'Profil uspesno izmenjen');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
