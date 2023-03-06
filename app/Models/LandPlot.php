<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LandPlot extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'cadastral_designation',
            'area_hectares',
            'measurement_date',
            'property_id'
        ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function land_uses(): BelongsToMany
    {
        return $this->belongsToMany(LandUse::class, 'land_plot_land_use')
            ->withPivot('area_hectares');
    }
}
