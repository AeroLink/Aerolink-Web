<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    protected $table = 'aerolink.tbl_hr1_applicants';

    protected $fillable = [
      'id'
      ,'applicant_code'
      ,'answerpivot_id'
      ,'firstname'
      ,'lastname'
      ,'middlename'
      ,'suffix_id'
      ,'date_of_birth'
      ,'place_of_birth'
      ,'gender'
      ,'email'
      ,'civil_status_id'
      ,'height'
      ,'weight'
      ,'contact_number'
      ,'educAttain'
      ,'prevSchool'
      ,'resumeCV'
    ];

}
