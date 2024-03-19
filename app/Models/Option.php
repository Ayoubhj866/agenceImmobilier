<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_option');
    }
}
