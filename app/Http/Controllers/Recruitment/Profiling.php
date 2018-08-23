<?php

namespace AeroLink\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use AeroLink\Http\Controllers\Controller;

use AeroLink\Job;
use AeroLink\Suffixes;
use Session;

class Profiling extends Controller
{
    public function initiateProfiling(){
        
        $jobinfo = Job::where('job_id', Session::get('jobID_apply'))->get();
        $suffixes = Suffixes::get();

        return view('Profiling.fillup', compact('jobinfo', 'suffixes'));

    }
}
