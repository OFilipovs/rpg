<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Person extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'first_name',
            'last_name',
            'personal_id_number',
            'type'
        ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function land_plots(): HasManyThrough
    {
        return $this->hasManyThrough(LandPlot::class, Property::class);
    }
}
