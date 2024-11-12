<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    public function loans():HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function irrigations():HasMany
    {
        return $this->hasMany(irrigation::class);
    }

    public function crops():HasMany
    {
        return $this->hasMany(Crop::class);
    }

    public function suppliers():HasMany
    {
        return $this->hasMany(Supplier::class);
    }

    public function buyers():HasMany
    {
        return $this->hasMany(Buyer::class);
    }

    public function governments():HasMany
    {
        return $this->hasMany(Government::class);
    }
    public function blogs():HasMany{
        return $this->hasMany(Blog::class);
    }

    public function extensions():HasMany{
        return $this->hasMany(Extension::class);
    }
}
