<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model {
    use SoftDeletes;

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
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    protected $dates
        = [
            'fecha_nac',
            'deleted_at',
            'created_at',
            'updated_at',
        ];

    public function ubigeo() {
        return $this->belongsTo('App\Ubigeo', 'ubigeo_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
            'longitude',
            'latitude',
            'ubigeo_id',
            'situacion_usuario_id',
            'tipo_formalidad_id',
            'tipo_usuario_id',
            'agente_id',
            'created_at',
            'updated_at',
        ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function setFechaNacAttribute($fecha_nac) {
        $this->attributes['fecha_nac'] = Carbon::createFromFormat('d/m/Y', $fecha_nac);
    }
}