<?php

namespace App\Actions;

use App\Models\Ad;
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
            return redirect()->back()->with('success', 'Sada uspesno pratite oglas');
        }
        return redirect()->route('login');


    }
}
