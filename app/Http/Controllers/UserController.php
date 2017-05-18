<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		try {
			return response()->json([
				'codigo'  => 200,
				'mensaje' => 'Debería mostrarse todos los usuarios, pero no',
			], 200);
		} catch (\Exception $e) {
			return response()->json([
				'codigo'  => 500,
				'mensaje' => 'Algo malo pasó.',
			], 500);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(UserRequest $request) {
		try {
			$validator = Validator::make($request->all(), $request->rules());
			if ($validator->fails()) {
				return response();
			} else {
				$paramatros             = $request->all();
				$paramatros['password'] = Hash::make($paramatros['password']);
				Independiente::create($request->all());
				return response()->json(['mensaje' => 'usuario creado correctamente.'], 201);
			}
		} catch (\Exception $e) {
			Log::critical("No se pudo guardar a independiente: POST.  {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
			return response()->json([
				'codigo'  => 500,
				'mensaje' => 'Algo malo pasó.',
			], 500);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		try {
			$user = User::find($id);
			if (!$user) {
				return response()->json([
					'codigo'  => 404,
					'mensaje' => 'No se encuentra un usuario con ese código.',
				], 404);
			} else {
				return response()->json($user, 200);
			}
		} catch (\Exception $e) {
			Log::critical("No se pudo obtener al usuario user: GET. {$e->getCode()}, {$e->getLine()}, {$e->getMessage()}");
			return response()->json([
				'codigo'  => 500,
				'mensaje' => 'Algo malo pasó.',
			], 500);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		try {

			$user = User::find($id);
			if (!$user) {
				return response()->json([
					'codigo'  => 404,
					'mensaje' => 'No se encuentra un usuario con ese código.',
				], 404);
			} else {
				$user->delete();
				return response()->json([
					'codigo'  => 200,
					'mensaje' => 'Usuario elimnado correctamente',
				], 200);
			}
		} catch (\Exception $e) {
			return response()->json([
				'codigo'  => 500,
				'mensaje' => 'Algo malo pasó.',
			], 500);
		}
	}


	public function agente() {
		$agent = new Agent();
		return response()->json($agent->isMobile());

	}
}
