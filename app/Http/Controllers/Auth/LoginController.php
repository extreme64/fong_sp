<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Misc\RouteWrapperController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirect user after login to dash.
     *
     * @var string
     */
    protected $redirectToDash = 'dashboard/account';

    private $routeWrapperController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RouteWrapperController $routeWrapperController)
    {
        // $this->middleware('guest')->except('logout');
        $this->routeWrapperController = $routeWrapperController;
    }

    protected function authenticated(Request $request, $user)
    {
        try {
            $user->createToken('login_token');
        } catch (Exception $e) {
            throw new Exception('Failed to create API token. ' . $e->getMessage());
        }
    }


    /**
     * Override path to SEO link structure
     *
     * @return string
     * 
     */
    protected function redirectPath()
    {
        return $this->routeWrapperController->generateUrl('dashboard.account.show');
    }
}
