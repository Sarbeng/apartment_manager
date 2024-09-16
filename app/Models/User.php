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
        'role',
        'google_id'
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

    // define a list of roles
    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUPERADMIN = 'super-admin';

    public const ROLE_REVIEWER = 'reviewer';

    /**
     * Check if user has specific role
     *  @param string $role
     * @return bool
     */

     public function hasRole ($role)
     {
        return $this->role === $role;

     }

     /**
      * Check if user is an admin
      * 
      * @return bool
      */


    // creating an user function 
    public function isSuperAdmin() 
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    // creating an admin function 
    public function isAdmin() 
    {
        return $this->role === self::ROLE_ADMIN;
    }

    // creating an user function 
    public function isReviewer() 
    {
        return $this->role === self::ROLE_REVIEWER;
    }

    // creating an user function 
    public function isUser() 
    {
        return $this->role === self::ROLE_USER;
    }
}
