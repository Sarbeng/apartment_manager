<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'tenant_id',
    //     'amount',
    //     'payment_date',
    //     'payment_method'
    // ];

    protected function tenant () : BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
