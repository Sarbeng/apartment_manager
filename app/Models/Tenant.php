<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'apartment_id',
    //     'move_in_date',
    //     'move_out_date'
    // ];

    /**
     * Get the user that is a tenant
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected function apartment (): HasOne 
    {
        return $this->hasOne(Apartment::class);
    }

    protected function payments () : HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // tenants have many requests
    protected function maintenanceRequests () : HasMany
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    
}
