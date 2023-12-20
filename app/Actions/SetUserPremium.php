<?php

namespace App\Actions;

use App\Enums\RoleEnums;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class SetUserPremium
{
    use AsAction;

    public function handle(User $user): \Illuminate\Http\RedirectResponse

    {
        if ((int)$user->role != RoleEnums::Premium->value) {
            $user->update(['role' => RoleEnums::Premium]);
            $user->save();
            foreach ($user->ads as $ad) {
                $ad->update(['home_page' => 'da']);
                $ad->save();
            }
            return redirect()->back()->with('success', 'Korisniku je uspešno setovan premium nalog');
        }

        return redirect()->back()->with('error', 'Korisniku već ima postavljen premium nalog');

    }
}
