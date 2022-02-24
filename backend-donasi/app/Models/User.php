<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
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
        'avatar' ///tambahan avatar ini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes'
    ];
        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
        'email_verified_at' => 'datetime',
        ];
        /**
        * campaigns
        *
        * @return void
        */
        public function campaigns()
        {
        return $this->hasMany(Campaign::class);
        }
        /**
         * getAvatarAttribute
         *
         * @param mixed $avatar
         * @return void
         */
        public function getAvatarAttribute($avatar)
        {
        if ($avatar != null) :
        return asset('storage/users/'.$avatar);
        else :
        return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100';
        endif;
        }
}

