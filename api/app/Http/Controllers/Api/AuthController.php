<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Si les paramètres ne conviennent un message d'erreur est renvoyé
        if ($validate->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['errors' => 'Wrong credentials'], 404);
        }
    
        $password = $request->password;
        if ($user->password != $password) {
            return response()->json(['errors' => 'Wrong credentials'], 404);
        }

        $token = $user->remember_token;

        return response()->json(['accessToken' => $token], 200);
    }
    
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
