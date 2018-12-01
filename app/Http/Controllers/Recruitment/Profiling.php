<?php

namespace aerolink\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use aerolink\Http\Controllers\Controller;

use aerolink\Job;
use aerolink\Suffixes;
use Session;

class Profiling extends Controller
{
    public function initiateProfiling(){
        
        $jobinfo = Job::where('job_id', Session::get('jobID_apply'))->get();
        $suffixes = Suffixes::get();

        return view('Profiling.fillup', compact('jobinfo', 'suffixes'));

    }
}
