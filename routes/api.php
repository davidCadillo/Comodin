<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
	Route::resource('users', 'UserController', [
		'except' => [
			'index',
			'create',
			'edit',
		],
	]);
	Route::get('agentes', 'UserController@agente');
	Route::get('users/{user}/ubigeos', 'UserController@ubigeo');
	Route::resource('ubigeos', 'UbigeoController', ['only' => ['show']]);
	Route::resource('situacionesusuarios', 'SituacionUsuarioController', [
		'only' => [
			'index',
			'show',
		],
	]);
	Route::get('ubigeos/{departamento}/{provincia}/{distrito}', 'UbigeoController@ubigeoByLugar');


});
