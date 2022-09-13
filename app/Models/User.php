<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    public function pic()
    {
        return $this->morphOne(File::class,'fileable');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order_item::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function getAvatar()
    {
        if(Auth::check())
        {
            if(filled(Auth::user()->pic))
            {
                return $user_avatar = Auth::user()->pic->file_path;
            }else{
                return $user_avatar = 'profile/1663002787_avatar3.png';
            }
        }

    }

    public static function getUsername()
    {
        if(Auth::check())
        {
            if(filled(Auth::user()->name))
            {
                return $user_name = Auth::user()->name;
            }else{
                return $user_name = '';
            }
        }

    }
}
