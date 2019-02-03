<?php

namespace AeroLinkWeb\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;

use AeroLinkWeb\Job;
use AeroLinkWeb\Suffixes;
use AeroLinkWeb\Models\Applicants;
use AeroLinkWeb\Models\PreScreening;
use AeroLinkWeb\JobOpening;
use AeroLinkWeb\Models\JobPosted;
use AeroLinkWeb\Models\Applications;
use AeroLinkWeb\Models\AppAccount;

use Session;
use DB;

use Mail;


class Profiling extends Controller
{
    public function initiateProfiling(){
        
        $jobinfo = JobPosted::where('id', Session::get('jobID_apply'))->get();
        $views = $jobinfo[0]->views + 1;
        JobPosted::where('id', Session::get('jobID_apply'))->update([
            'views' => $views
        ]);

        $suffixes = Suffixes::get();
        $civilStatus = DB::table('aerolink.tbl_hr1_civil_status')->get();

        return view('Profiling.fillup', compact('jobinfo', 'suffixes', 'civilStatus'));

        
    }

    public function processApplication(Request $request) {

        $ResumeCV = $request->file('applicant_file');
        
        if ($ResumeCV) {
            $ResumeCV_filename = '/cvs/' . $ResumeCV->getClientOriginalName();
            $ResumeCV->move(public_path('cvs'), $ResumeCV_filename);
        }
        
        $pre = PreScreening::create([
            'Q1' => $request->input('Q1'),
            'Q2' => $request->input('Q2'),
            'Q3' => $request->input('Q3'),
            'Q4' => $request->input('Q4'),
            'Q5' => $request->input('Q5'),
            'Q6' => $request->input('Q6')
        ]);
        
        $app = Applicants::create([
            
            'answerpivot_id' => $pre->id,
            'firstname' => $request->input('firstname')
            ,'lastname' => $request->input('lastname')
            ,'middlename' => $request->input('middlename')
            ,'suffix_id' => $request->input('suffix') 
            ,'date_of_birth' => $request->input('DateOfBirth')
            ,'place_of_birth' => $request->input('PlaceOfBirth')
            ,'gender' => $request->input('Gender')
            ,'email' => $request->input('email')
            ,'civil_status_id' => $request->input('civil_status')
            ,'height'=> $request->input('height') 
            ,'weight' => $request->input('weight')
            ,'contact_number' => $request->input('contact_number')
            ,'educAttain' => $request->input('educ_attain')
            ,'prevSchool' => $request->input('prevSchool')
            ,'resumeCV' => $ResumeCV_filename
        ]);

        $applicant = Applicants::where('id', $app->id)->update(array(
            'applicant_code' => 'APP000' . $app->id
        ));

        Applications::create([
            'app_id' => $app->id,
            'jobPosted_id' => Session::get('jobID_apply')
        ]);

        $rpwd = str_random(10);
        AppAccount::create([
            'app_id' => $app->id,
            'username' => 'APP000' . $app->id,
            'password' => \Hash::make($rpwd)
        ]);

        $to_name = $request->input('firstname');
        $to_email = $request->input("email");
    
        Mail::send('mails.application', [
            'fullname' => $request->input('firstname'),
            'username' => 'APP000' . $app->id,
            'password' => $rpwd
        ], function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('AeroLink Careers : Applicant Portal Credentials');
            $message->from('aerolinkfms@gmail.com', 'AeroLink HR Department');
        });
        
        return view('Profiling.success');
    }
}
