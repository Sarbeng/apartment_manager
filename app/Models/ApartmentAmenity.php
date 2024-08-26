<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApartmentAmenity extends Model
{
    use HasFactory;

    protected $table = 'apartment_amenities';

    protected $fillable = [
        'apartment_id',
        'amenities_id'
    ];

    protected function apartment () : BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    protected function amenities () : BelongsTo
    {
        return $this->belongsTo(Amenity::class);
    }
}
