<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'other_names',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // creating an user function 
    public function isSuperAdmin() 
    {
        return $this->role === 'super-admin';
    }

    // creating an admin function 
    public function isAdmin() 
    {
        return $this->role === 'admin';
    }

    // creating an user function 
    public function isReviewer() 
    {
        return $this->role === 'reviewer';
    }

    // creating an user function 
    public function isUser() 
    {
        return $this->role === 'user';
    }
}
