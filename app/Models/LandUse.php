<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LandUse extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'area_hectares'
        ];

    public function land_plots(): BelongsToMany
    {
        return $this->belongsToMany(LandPlot::class, 'land_plot_land_use')
            ->withPivot('area_hectares');
    }
}
