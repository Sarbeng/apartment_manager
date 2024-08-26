<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Apartment;


class ApartmentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'number_of_apartments'
    ];

    protected function apartments () : HasMany
    {
        return $this->hasMany(Apartment::class);
    }
}
