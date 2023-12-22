<?php

namespace App\Actions;

use App\Jobs\AdvertHasBeenSoldSendEmail;
use App\Models\Ad;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class SetAdverToSold
{
    use AsAction;

    public function handle(Ad $ad, Request $request)
    {
        if ($ad->user->id === $request->user()->id) {
            if ($ad->isSold !== '1') {
                $ad->update(['isSold' => '1']);
                $ad->save();
                if ($ad->likes) {
                    foreach ($ad->likes as $like) {
                        AdvertHasBeenSoldSendEmail::dispatch($like, $ad);
                    }
                }

                return redirect()->back()->with('success', 'Oglas oznacen kao prodat');

            }else
                return redirect()->back()->with('error', 'Oglas je vec oznacen kao prodat');
        }

    }
}
