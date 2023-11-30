<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imageable() : MorphTo{
        return $this->morphTo();
    }
    protected function imagePath() : Attribute{
        return new Attribute(
            get: fn() => \Storage::disk('adImages')->url($this->image)
        );
    }
}
