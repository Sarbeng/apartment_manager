<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'apartment_id',
        'move_in_date',
        'move_out_date'
    ];

    protected function apartment (): HasOne 
    {
        return $this->hasOne(Apartment::class);
    }

    protected function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
