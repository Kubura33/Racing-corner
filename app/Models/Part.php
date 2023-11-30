<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Part extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ad() : MorphMany{
        return $this->morphMany(Ad::class, 'advertisable');
    }
    public function imageable() : MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function images(): HasMany{
        return $this->hasMany(PartImages::class, 'part_id');
    }
}
