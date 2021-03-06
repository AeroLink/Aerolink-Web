<?php

<<<<<<< HEAD
namespace AeroLinkWeb\Http\Controllers\Auth;

use AeroLinkWeb\Http\Controllers\Controller;
=======
namespace aerolink\Http\Controllers\Auth;

use aerolink\Http\Controllers\Controller;
>>>>>>> 9aa4ed0bd81421195188f6d97b66fd84bf394da2
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
}
