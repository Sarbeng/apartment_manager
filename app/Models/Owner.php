<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'apartment_block_id',
        'phone_number',
        'address'
    ];

    protected function user () : HasMany
    {
        return $this->hasMany(User::class);
    }
}
