<?php

namespace App\Actions;

use App\Models\Ad;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Lorisleiva\Actions\Concerns\AsAction;

class FollowAdvert
{
    use AsAction;

    public function handle(Request $request)
    {

        $ad = Ad::find($request->ad);
        if($request->user()->id === $ad->user->id){
            return redirect()->back()->with('error', 'Ne mozete zapratiti svoj oglas!');
        }
        else{
        if ($request->user()) {
            $rateLimiterKey = 'follow-ad:' . $request->user()->id . ':' . $ad->id;
            $decayMinutes = 60;
            if(RateLimiter::tooManyAttempts($rateLimiterKey, 6, $decayMinutes)){
                return redirect()->back()->with('error', 'Previse pokusaja!');
            }
            else{
                RateLimiter::hit($rateLimiterKey, $decayMinutes);

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
        }
        return redirect()->route('login');
        }

    }

}
