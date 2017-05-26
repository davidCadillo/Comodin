<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 22/05/2017
 * Time: 12:05 PM
 */

namespace App;
class HttpResponseCode {
	public static function response($code = 200, $message = NULL) {
		switch ($code) {
			case 200:
				return response()->json([
					'data' => $message = is_null($message) ? 'Todo correcto.' : $message,
					'code' => 200,
				], 200);
			case 201:
				return response()->json([
					'data' => $message = is_null($message) ? 'Recurso creado correctamente.' : $message,
					'code' => 201,
				], 201);
			case 404:
				return response()->json([
					'data' => $message = is_null($message) ? 'Recurso no encontrado.' : $message,
					'code' => 404,
				], 404);
			case 500:
				return response()->json([
					'data' => $message = is_null($message) ? 'Ha ocurrido un error inesperado.' : $message,
					'code' => 500,
				], 500);
			default:
				return response()->json([
					'data' => $message,
					'code' => $code,
				], $code);
		}
	}
}