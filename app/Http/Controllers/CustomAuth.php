<?php

namespace AeroLinkWeb\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuth extends Controller
{
    public static function Auth($user){
        session(['user' => $user]);
        return true;
    }

    public static function user(){
        return session('user') !== null ? ( (object) session('user')) : false;
    }

    public static function logout(){
        session()->forget('user');
    }

    public static function AuthVendor($user){
        session(['vendor_user' => $user]);
        return true;
    }

    public static function VendorUser(){
        return session('vendor_user') !== null ? ( (object) session('vendor_user')) : false;
    }

    public static function Vendorlogout(){
        session()->forget('vendor_user');
    }

    
}
