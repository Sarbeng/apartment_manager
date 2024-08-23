<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'number_of_apartments'
    ];
}
