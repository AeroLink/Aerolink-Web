<?php

namespace AeroLinkWeb\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;

use AeroLinkWeb\JobOpening;
use AeroLinkWeb\Models\JobPosted;
use Session;

class jobOpportunityController extends Controller
{
    public function getCareersDB(){

        return  JobPosted::select('aerolink.tbl_hr1_posting.id as job_id', 'aerolink.tbl_hr1_posting.title as t', 'aerolink.tbl_hr1_posting.description', 'jobOpen', 'aerolink.tbl_hr1_posting.salary',  'aerolink.tbl_hr1_posting.status', 'aerolink.tbl_hr1_posting.views')
        ->join('aerolink.tbl_hr4_job_limit', 'aerolink.tbl_hr4_job_limit.id', 'aerolink.tbl_hr1_posting.jobPosted_id')
        ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_jobs.job_id', 'aerolink.tbl_hr4_job_limit.job_id')
        ->where([
            ['isDeleted', '=', '0']
        ])->get();

    }

    public function applyNow($id){
        Session::put('jobID_apply', $id);
        return redirect('/terms');
    }

    public function viewCareers(){
        $jobOpening = $this->getCareersDB();
        return view('Careers/viewCareers', compact('jobOpening'));
    }

    public function listCareers(Request $request){
        
        $jobOpening = $this->getCareersDB();
        

        if($request->ajax()){
            return response([
                "success" => true,
                "data" => $jobOpening
            ]);
        }
   }

}
