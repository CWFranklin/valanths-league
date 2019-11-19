<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'league_account',
        'avatar',
        'provider',
        'provider_id',
        'password',
        'free_agent',
        'peak_rank',
        'preferred_position_1',
        'preferred_position_2',
        'preferred_position_3',
        'preferred_position_4',
        'preferred_position_5',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rank()
    {
        return $this->belongsTo('App\Rank', 'peak_rank');
    }
}
