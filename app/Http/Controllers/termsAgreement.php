<?php

namespace aerolink\Http\Controllers;

use Illuminate\Http\Request;

class termsAgreement extends Controller
{
    
    public function viewTerms(){
        $terms = "";
        return view('TOS.tos', compact('terms'));
    }

    

}
