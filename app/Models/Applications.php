<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table = 'aerolink.tbl_hr1_appJob_pivot';

    protected $fillable = [
        'app_id'
        ,'jobPosted_id'
        ,'status'
    ];
}
