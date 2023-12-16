<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Builder;

class Ad extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advertisable() : MorphTo{
        return $this->morphTo();
    }
    public function user() : BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter(Builder $query, $filters) : Builder{
        return $query
            ->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '=>', $value)
        )
            ->when(
            $filters['priceTo'] ?? false,
            fn($query, $value) => $query->where('price', '<=', $value)
        );

    }
    public function scopeManufacter(Builder $q, $disciplines) : Builder{
        if ($disciplines) {
            $q->where('advertisable_type', '=', 'parts')->whereHasMorph('advertisable', [Part::class], function ($query) use ($disciplines) {
                $query->whereIn('manufacter', $disciplines);
            });
        }
           return $q;
    }
}
