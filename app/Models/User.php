<?php

namespace App\Models;

//use Laravel\Sanctum\HasApiTokens;
//use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use MatanYadaev\EloquentSpatial\Objects\Point;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'job',
        'about',
        'location',
        'available_to_hire',
        'formatted_address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'location' => Point::class
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }
}
