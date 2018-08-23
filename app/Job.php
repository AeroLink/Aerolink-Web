<?php

namespace AeroLink;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "tbl_jobs";

    protected $fillable = ["job_id", "title", "description"];

    
}
