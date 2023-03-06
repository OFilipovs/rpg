<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'cadastral_number',
            'status',
            'person_id'
        ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function land_plots(): HasMany
    {
        return $this->hasMany(LandPlot::class);
    }
}
