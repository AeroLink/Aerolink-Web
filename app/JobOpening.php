<?php

namespace aerolink;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $table = "aerolink.tbl_hr4_job_limit";

    protected $fillable = ["id", "job_id", "job_limit", "jobOpen"];
}
