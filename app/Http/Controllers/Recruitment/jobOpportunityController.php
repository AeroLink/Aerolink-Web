<?php

namespace AeroLink\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use AeroLink\Http\Controllers\Controller;

use AeroLink\JobOpening;
use Session;

class jobOpportunityController extends Controller
{
    public function getCareersDB(){

        return  JobOpening::select('tbl_jobs.job_id', 'title', 'description', 'jobOpen')->join('tbl_jobs', 'tbl_jobs.job_id', 'tbl_job_limit.job_id' )->where([
            ['jobOpen', '>', '0']
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
