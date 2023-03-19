<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'price',
        'lot_area',
        'bedroom',
        'restroom',
        'window',
        'garage',
        'date_built',
    ];

    public function house_images(): HasMany
    {
        return $this->hasMany(HouseImage::class);
    }

    public function house_features(): HasMany
    {
        return $this->hasMany(HouseFeature::class);
    }
}
