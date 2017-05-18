<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model {

    /*
     * implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {
    use Notifiable, Authenticatable, Authorizable, CanResetPassword, EntrustUserTrait;
     *
     * */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded
        = [
            'created_at',
            'updated_at',
        ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ];

    public function ubigeo() {
        return $this->belongsTo('App\Ubigeo', 'ubigeo_id');
    }
}
