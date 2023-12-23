<?php

namespace App\Models;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
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
    public function likes() : BelongsToMany{
        return $this->belongsToMany(User::class, "likes");
    }
    public function scopeFilter(Builder $query, $filters) : Builder{
        return $query
            ->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value)
        )
            ->when(
            $filters['priceTo'] ?? false,
            fn($query, $value) => $query->where('price', '<=', $value)
        )
            ->when(
                $filters['search'] ?? false,
                fn($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%')
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
    public function scopeDiscipline(Builder $q, $disciplines) : Builder{
        if ($disciplines) {
            $q->where('advertisable_type', '=', 'vehicle')->whereHasMorph('advertisable', [Vehicle::class], function ($query) use ($disciplines) {
                $query->whereIn('discipline', $disciplines);
            });
        }
        return $q;
    }
    public function scopeVrsta(Builder $q, $vrsta) : Builder{
        if($vrsta){
            $q->where('advertisable_type', '=', 'equipment')->whereHasMorph('advertisable', [Equipment::class], function ($query) use ($vrsta) {
                $query->whereIn('vrsta', $vrsta);
            });
        }
        return $q;
    }
    public function scopeEquipmentSize(Builder $q, $size) : Builder {
        if($size){
            $q->where('advertisable_type', '=', 'equipment')->whereHasMorph('advertisable', [Equipment::class], function ($query) use ($size) {
                $query->whereIn('size', $size);
            });
        }
        return $q;
    }
}
