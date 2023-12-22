<?php

namespace App\Jobs;

use App\Mail\AdvertHasBeenSold;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdvertHasBeenSoldSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public Ad $ad)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Mail::to($this->user->email)->send(new AdvertHasBeenSold($this->ad));
    }
}
