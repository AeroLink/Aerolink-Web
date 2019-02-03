<?php

namespace AeroLinkWeb\Http\Controllers\ApplicantAccounts;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\AppSched;
use AeroLinkWeb\Models\Applicants;
use AeroLinkWeb\Models\AppFeeds; 
use AeroLinkWeb\Models\AppExam; 
use CusAuth;

class ApplicantController extends Controller
{

    public function __construct() {
        $this->middleware('cusauth');
    }

    public function index() {
        
        $exam = 0;

        if(CusAuth::user()->feed_status_id > 0) {
            $feeds = AppFeeds::where('feed_status_id', CusAuth::user()->feed_status_id)->get();
            return view('Applicant.denied', compact('feeds', 'exam'));
        }

        if(AppExam::where('applicant_id', CusAuth::user()->app_id)->count() > 0) {
            $exam = AppExam::where('applicant_id', CusAuth::user()->app_id)->get()[0]->applicantexam_id;
        }

        $schedule = AppSched::where('app_id', CusAuth::user()->app_id)->get();
        $applicants = Applicants::where('id', CusAuth::user()->app_id)->get();
        return view('Applicant.index', compact('schedule', 'applicants', 'exam'));
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
