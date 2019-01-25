<?php

namespace AeroLinkWeb\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\LOG1_Supplier as supplier;
use CusAuth;

class VendorController extends Controller
{
    public function index() {
        if ( CusAuth::VendorUser() ) {
            return redirect('/Vendors/Dashboard');
        }

        return view('Vendor.index');
    }

    public function registration(Request $request) {

        if(supplier::where('email', $request->input('email'))->count() == 0) {
            $s = supplier::create([
                'fname' => $request->input('fname'), 
                'lname' => $request->input('lname'), 
                'mname' => $request->input('mname'), 
                'address' => $request->input('address'), 
                'contact_no' => $request->input('contact_no'), 
                'company_name' => $request->input('company_name'), 
                'email' => $request->input('email'), 
                'password' => \Hash::make($request->input('password'))
            ]);
    
            CusAuth::AuthVendor($s);
    
            return redirect('/Vendors/Dashboard');
        }

        return redirect()->back()->with('message', 'Email was already existing');
        
    }

    public function login(Request $request) {
        $exist = supplier::where('email', $request->input('email'))->count();

        if($exist != 0) {
            $user = supplier::where('email', $request->input('email'))->get()[0];
            if(\Hash::check($request->input('password'), $user->password)) {
                CusAuth::AuthVendor($user);
                return redirect('/Vendors/');
            }
        } 

        return redirect()->back()->with('message', 'Login Failed');
    }

    public function logout() {
        CusAuth::Vendorlogout();
        return redirect('/Vendors/');
    }
}
