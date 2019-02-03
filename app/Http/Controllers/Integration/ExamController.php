<?php

namespace AeroLinkWeb\Http\Controllers\Integration;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\Assestment;
use AeroLinkWeb\Models\AppExam; 
use DB;
use Log;

class ExamController extends Controller
{
    
    public function __construct() {
        $this->middleware('cusauth');
    }
    
    public function index($id){
        $exam = AppExam::where('applicantexam_id', $id)->get()[0];
        $exam_id = $exam->exam_id;
        $exam_ix = $exam->applicantexam_id;
        $vals = [$exam_id];
        $questions = DB::select('EXEC getExamination ?', $vals);
        return view('Modules.examination', compact('questions', 'exam_ix'));
    }

    public function submitExamination(Request $request) {
        $res = $request->input('res');
        $score = 0;
        $increment = 0;
        foreach($res as $r) {
            $cb = DB::table('aerolink.tbl_hr2_evaluation')->select('isChecked')->where('choice_id',$r['CHOICE'])->get();
            if($cb[0]->isChecked == '1') {
                $score += 1;
            }
            $increment += 1;
        }
        
        $finalScore = ($score / $increment) * 100;

        $vals = [$request->input('exam_id'), $finalScore];
        DB::select('EXEC HR1_UpdateExamination ?, ?', $vals);
    }

}
