<?php

namespace AeroLinkWeb;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "aerolink.tbl_hr4_jobs";

    protected $fillable = ["job_id", "title", "description"];

    
}
