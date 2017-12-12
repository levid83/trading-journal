<?php

namespace App;

use App\My\Models\TradingAccount;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends \Illuminate\Foundation\Auth\User
{
    use  Notifiable, HasRoles;
    
    const SUPERUSER_ROLE_ID=1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function tradingAccounts(){
    	return $this->hasMany(TradingAccount::class);
	}
	
	public function isSuperAdmin(){
    	return $this->role_id==self::SUPERUSER_ROLE_ID;
	}
}
