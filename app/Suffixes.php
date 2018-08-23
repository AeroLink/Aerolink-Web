<?php

namespace AeroLink;

use Illuminate\Database\Eloquent\Model;

class Suffixes extends Model
{
    protected $table = "tbl_hr1_suffix";

    protected $fillable = ["id", "suffix_name"];

}
