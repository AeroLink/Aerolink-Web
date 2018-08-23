<?php

namespace AeroLink;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $table = "tbl_job_limit";

    protected $fillable = ["id", "job_id", "job_limit", "jobOpen"];
}
