<?php

namespace aerolink;

use Illuminate\Database\Eloquent\Model;

class Suffixes extends Model
{
    protected $table = "aerolink.tbl_hr1_suffix";

    protected $fillable = ["id", "suffix_name"];

}
