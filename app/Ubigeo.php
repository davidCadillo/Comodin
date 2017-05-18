<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model {
	protected $primaryKey = 'cod_ubigeo';
	protected $keyType = 'char';
	public $incrementing = false;
	public $timestamps = false;

	public function users() {
		return $this->hasMany('App\User');
	}


}
