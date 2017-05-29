<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'nombres'   => 'required|max:20',
			'apellido1' => 'required|alpha|max:25',
			'apellido2' => 'required|alpha|max:25',
			'password'  => 'required|between:8,17',
			'dni'       => 'unique:users,dni|digits:8',
			'celular'   => 'unique:users,phone|digits:9',
			'email'     => 'required|email|unique:users,email',
			'fecha_nac' => 'required|date_format:d/m/Y',
		];
	}


	public function response(array $errors) {
		// Put whatever response you want here.
		return new JsonResponse([
			'status' => '422',
			'errors' => $errors,

		], 422);
	}

	public function messages() {
		return [
			'alpha'              => 'Solo se aceptan letras',
			'digits'             => 'El :attribute debe contener :digits dígitos y no letras',
			'email'              => 'El email debe ser válido',
			'unique'             => 'Este :attribute ya se encuentra registrado',
			'required'           => 'El :attribute no puede quedar en blanco',
			'celular.unique'     => 'El número de celular ya se cuentra registrado',
			'nombres.required'   => 'El nombre no debe estar en blanco',
			'apellido1.required' => 'El apellido paterno no debe estar en blanco',
			'apellido2.required' => 'El apellido materno no debe estar en blanco',
		];

	}

}
