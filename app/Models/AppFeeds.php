<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class AppFeeds extends Model
{
    protected $table = 'aerolink.tbl_hr1_feedback_status';

    protected $fillable = [
        'feed_status_id',
        'reason'
    ];
}
