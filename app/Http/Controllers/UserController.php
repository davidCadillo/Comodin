<?php

namespace App\Http\Controllers;

use App\HttpResponseCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        try {
            User::create($request->all());
            return HttpResponseCode::response(201, 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user) {
        try {
            $user->update($request->all());
            return HttpResponseCode::response(200, 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            return $e->getTrace();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $user->delete();
        return HttpResponseCode::response(200, 'Usuario eliminado correctamente');
    }

    public function ubigeo(User $user) {
        return $user->ubigeo()->get();
    }

    public function asignarAgente(){

    }


}
