<?php

namespace AeroLinkWeb\Http\Controllers\ApplicantAccounts;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\AppAccount;
use Hash;
use CusAuth;

class loginController extends Controller
{
    public function __construct() {
        
    }

    public function index() {
        if ( CusAuth::user() ) {
            return redirect('/applicant/');
        }
        
        return view('Applicant.login');
    }

    public function executeLogin(Request $request) {
        $exist = AppAccount::where('username', $request->input('email'))->count();

        if($exist != 0) {
            $user = AppAccount::where('username', $request->input('email'))->get()[0];
            if(Hash::check($request->input('password'), $user->password)) {
                CusAuth::Auth($user);
                return redirect('/applicant/');
            }
        } 

        return redirect()->back()->with('message', 'Login Failed');
    }

    public function executeLogout() {
        CusAuth::logout();
        return redirect('/applicant/');
    }

    
}
