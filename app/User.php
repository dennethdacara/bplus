<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const IS_ADMIN = 1;
    const IS_CUSTOMER = 2;
    const IS_EMPLOYEE = 3;

    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'password', 'contact_no', 'address', 'gender', 'role_id', 'expertise'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
