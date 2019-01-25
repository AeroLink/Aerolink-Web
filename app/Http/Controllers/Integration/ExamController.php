<?php

namespace AeroLinkWeb\Http\Controllers\Integration;

use Illuminate\Http\Request;
use AeroLinkWeb\Http\Controllers\Controller;
use AeroLinkWeb\Models\Assestment;
use DB;

class ExamController extends Controller
{
    public function index(){
        $questions = Assestment::select(
            "aerolink.tbl_hr2_assessment.question",
            DB::raw("
            STUFF(( SELECT DISTINCT ',' + ( choice + '. ' + choice_description) FROM aerolink.tbl_hr2_evaluation 
            WHERE question_id = aerolink.tbl_hr2_assessment.question_id 
            ORDER BY ',' + ( choice + '. ' + choice_description) ASC FOR XML PATH ('')), 1, 1, '') as choices
            "),
            DB::raw("
            (SELECT choice FROM aerolink.tbl_hr2_evaluation WHERE ischecked = 1 AND question_id = 
            aerolink.tbl_hr2_assessment.question_id) as correct
            ")
        )->where("aerolink.tb_hr2_assessment.choice_id", 1)->get();

        //dd($questions);
        
        return $questions;
        //return view('Modules.examination', compact('questions'));
    }
}
