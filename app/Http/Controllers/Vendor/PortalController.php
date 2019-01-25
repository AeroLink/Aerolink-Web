<?php

namespace AeroLinkWeb\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\LOG1_Supplier as supplier;
use CusAuth;

class PortalController extends Controller
{
    public function __construct() {
        $this->middleware('vendorauth');
    }

    public function dashboard(){ 
        return view('Vendor.dashboard');
    }
}
