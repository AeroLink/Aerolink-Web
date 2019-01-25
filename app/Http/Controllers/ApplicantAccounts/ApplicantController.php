<?php

namespace AeroLinkWeb\Http\Controllers\ApplicantAccounts;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\AppSched;
use AeroLinkWeb\Models\Applicants;
use CusAuth;

class ApplicantController extends Controller
{

    public function __construct() {
        $this->middleware('cusauth');
    }

    public function index() {
        $schedule = AppSched::where('app_id', CusAuth::user()->app_id)->get();
        $applicants = Applicants::where('id', CusAuth::user()->app_id)->get();
        return view('Applicant.index', compact('schedule', 'applicants'));
    }

    public function getApplicant() {
        return response([
            "applicant" => CusAuth::user()->app_id
        ]);
    }
    //checking schedule
    public function checkSched() {
        $schedule = AppSched::where('app_id', CusAuth::user()->app_id)->get();
        return response([
            "data" => json_encode($schedule)
        ]);
    }
}
