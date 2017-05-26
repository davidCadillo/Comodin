<?php

namespace App\Http\Controllers;

use App\Ubigeo;

class UbigeoController extends Controller {
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Ubigeo $ubigeo
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Ubigeo $ubigeo) {
		return $ubigeo;
	}

	public function ubigeoByLugar($departamento, $provincia, $distrito) {

		return Ubigeo::select('cod_ubigeo')->where('departamento', strtoupper($departamento))
		             ->where('provincia', strtoupper($provincia))->where('distrito', strtoupper($distrito))->get();

	}
}
