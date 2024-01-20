<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index(Request $request){
        return Inertia::render(
            'Profile/UserNotifications',
            [
                'notifications' => $request->user()->notifications
            ]
        );
    }
    public function update(Request $request, $notification){
        $request->user()->notifications->where('id', $notification)->markAsRead();

    }
    public function destroy(Request $request){
        $user = $request->user();
        $user->unreadNotifications->map(function($n) {
            $n->markAsRead();
        });

        return redirect()->back()->with('success', "Sve notifikacije su oznacene kao procitane");

    }

}
