<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ApartmentBlock;


class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_number',
        'apartment_block_id',
        'is_occupied'
    ];

    protected function apartmentBlock () : BelongsTo
    {
        return $this->belongsTo(ApartmentBlock::class);
    }

    protected function tenant () : BelongsTo
    {
        return $this->belongsTo(ApartmentBlock::class);
    }

    protected function amenities () : HasMany
    {
        return $this->hasMany(Amenity::class);
    }
}
