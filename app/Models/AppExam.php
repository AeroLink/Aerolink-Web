<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class AppExam extends Model
{
    protected $table = 'aerolink.tbl_hr1_applicant_exam';

    protected $fillable = [
        'exam_id',
        'applicant_id',
        'isTaken',
        'score'
    ];
}
