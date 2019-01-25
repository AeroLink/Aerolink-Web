<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class AppSched extends Model
{
    protected $table = 'aerolink.tbl_hr1_appSched';

    protected $fillable = [
        'app_id',
        'purpose',
        'scheduled_date',
        'remarks',
        'status'
    ];
}
