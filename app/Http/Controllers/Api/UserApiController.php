<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    public function remoteLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (auth()->attempt($credentials)) {
            $user =  auth()->user();

            $user_data = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ];

            return response()->json(['token' => $user->api_token, 'user' => $user_data], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function getProfile(Request $request) 
    {
        $user = $request->user();

        $return = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created' => $user->created_at
        ];

        return response()->json(['profile' => $return], 200);
    }
}