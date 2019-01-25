<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class PreScreening extends Model
{
    
    protected $table = 'aerolink.tbl_hr1_answerPreScreening';

    protected $fillable = ['answerpivot_id', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6'];
}
