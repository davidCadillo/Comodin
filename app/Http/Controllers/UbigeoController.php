<?php

namespace App\Http\Controllers;

use App\Ubigeo;
use Illuminate\Http\Request;

class UbigeoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Ubigeo $ubigeo
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($cod) {
		try {
			$size = strlen($cod);
			if ($size != 6) {
				return response()->json([
					'codigo'  => 404,
					'mensaje' => 'El ubigeo consta de 6 números.',
				], 404);
			}
			$ubigeo = Ubigeo::find($cod);
			if (!$ubigeo) {
				return response()->json([
					'codigo'  => 404,
					'mensaje' => 'Ha habido algún error. No se encontró nada.',
				], 404);
			} else {
				return response()->json($ubigeo, 200);
			}
		} catch (\Exception $e) {
			Log::critical("No se pudo obtener al usuario independiente: GET. {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
			return response()->json([
				'codigo'  => 500,
				'mensaje' => 'Algo malo pasó.',
			], 500);
		}


	}

	public function ubigeoByLugar($departamento, $provincia, $distrito) {
		return Ubigeo::select('cod_ubigeo')->where('departamento', strtoupper($departamento))
		             ->where('provincia', strtoupper($provincia))->where('distrito', strtoupper($distrito))->get();

	}
}
