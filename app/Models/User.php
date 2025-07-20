<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    /**
     * Get the problems of this user.
     */
    public function problems(): HasMany
    {
        return $this->hasMany(Problem::class);
    }
    
    /**
     * Get the comments of this user.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * Get the roles of this user.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
    
    /**
     * Check if the user has a given permission.
     *
     * @param string $permission
     * @return boolean
     */
    public function hasPermission(string $permission): bool
    {
        return $this->roles->pluck('permissions')->flatten()->contains('name', $permission);
    }
    
    /**
     * Check if the user has a given role.
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole(string $role): bool
    {
        return $this->roles->contains('name', $role);
    }
}
