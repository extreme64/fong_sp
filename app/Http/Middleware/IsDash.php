<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class IsDash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::user() === null) {
            return redirect()->route('login')->with('error', 'Opps! No permission to access.');
        }

        $user = auth()->user();
       
        if($user !== null) {
            $token = $user->createToken('web_login_token')->accessToken;
            
            View::share('user', $user);        
            View::share('token', $token);
        }

        return $next($request);
    }
}
