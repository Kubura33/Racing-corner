<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ad() : MorphMany{
        return $this->morphMany(Ad::class, 'advertisable');
    }
    public function images() : HasMany{
        return $this->hasMany(VehicleImages::class,'vehicle_id');
    }
    public function imageable() : MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }

}
