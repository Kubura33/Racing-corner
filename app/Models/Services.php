<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Services extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function payments() : BelongsTo{
        return $this->belongsTo(Payments::class, 'service_id');
    }
}
