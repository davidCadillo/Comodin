<?php

namespace App\Http\Controllers;

use App\SituacionUsuario;

class SituacionUsuarioController extends Controller {

	public function index() {
		return SituacionUsuario::all();
	}

	public function show(SituacionUsuario $situacionesusuario) {
		return $situacionesusuario;
	}
}
