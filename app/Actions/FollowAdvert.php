<?php

namespace App\Actions;

use App\Models\Ad;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class FollowAdvert
{
    use AsAction;

    public function handle(Request $request, Ad $ad)
    {

        if ($request->user()) {
            if ($request->user()->likes->contains($ad)) {
                $request->user()->likes()->detach($ad);
                return redirect()->back()->with('success', 'Otpratili ste ovaj oglas');
            }
            $request->user()->likes()->attach($ad);
            $user_being_notified = $ad->user;
            if ($user_being_notified->userSetting->receive_follow_notifications) {
                $ad->user->notify(new FollowNotification($ad, $request->user(),
                    $user_being_notified->userSetting->receive_notifications_via_email,
                    $user_being_notified->userSetting->receive_notifications_via_website,
                ));
            }
            return redirect()->back()->with('success', 'Sada uspesno pratite oglas');
        }
        return redirect()->route('login');


    }
}
