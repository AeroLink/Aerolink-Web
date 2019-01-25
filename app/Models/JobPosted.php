<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosted extends Model
{
    protected $table = 'aerolink.tbl_hr1_posting';

    protected $fillable = [
        'jobPosted_id',
        'title',
        'status',
        'salary',
        'description',
        'publish_on',
        'until',
        'views'
    ];
}
