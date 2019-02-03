<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class AppAccount extends Model
{
    protected $table = 'aerolink.tbl_hr1_applicant_accounts';

    protected $fillable = [
        'username',
        'password',
        'app_id',
        'feed_status_id'
    ];
}
