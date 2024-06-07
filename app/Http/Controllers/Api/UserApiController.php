<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Response;
use Illuminate\Contracts\Routing\ResponseFactory;

class UserApiController extends Controller
{
    public function remoteLogin(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                $user = auth()->user();

                $token = $user->createToken('remote_login_token');

                $apiToken = $token->accessToken;

                $user_data = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];

                return response()->json(['token' => $apiToken, 'user' => $user_data], 201);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error occurred while logging in'], 500);
        }
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