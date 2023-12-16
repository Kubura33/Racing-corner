<?php

namespace App\Actions;

use App\Models\Ad;
use http\Env\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class SetAdvertToPremium
{
    use AsAction;

    public function handle(Ad $ad)
    {
        $ad->update(['home_page' => 'da']);
        $ad->save();
        return redirect()->back()->with('success', 'Oglas postavljen kao premium');
    }
}
