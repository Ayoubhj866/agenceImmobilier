<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'address',
        'city',
        'country',
        'price',
        'bedrooms',
        'bathrooms',
        'size',
        'sold',
    ];



    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'property_option');
    }
}
