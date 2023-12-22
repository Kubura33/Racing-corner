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
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
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
        if($request->oldPassword && $request->newPassword){
            $s = \Hash::check($request->oldPassword, $user->password);
            $request->validate(
                [
                    'newPassword' => ['required', 'min:8']
                ]
            );
            if($s){
                $user->update(['password' => $request->newPassword]);
            }
            else{
                return \redirect()->back()->with('error', 'Stara lozinka je netacna!');
            }
        }
        else if($request->oldPassword){
            return \redirect()->back()->with('error', 'Unesite novu lozinku!');

        }
        $user->save();
//        $request->user()->fill($request->validated());
//
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
//
//        $request->user()->save();

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
