<?php

<<<<<<< HEAD
namespace AeroLinkWeb\Http\Controllers\Auth;

use AeroLinkWeb\Http\Controllers\Controller;
=======
namespace aerolink\Http\Controllers\Auth;

use aerolink\Http\Controllers\Controller;
>>>>>>> 9aa4ed0bd81421195188f6d97b66fd84bf394da2
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
