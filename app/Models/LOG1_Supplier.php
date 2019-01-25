<?php

namespace AeroLinkWeb\Models;

use Illuminate\Database\Eloquent\Model;

class LOG1_Supplier extends Model
{
    protected $table = 'aerolink.tbl_log2_registration_form';

    protected $fillable = ['fname', 'lname', 'mname', 'address', 'contact_no', 'company_name', 'email', 'password', 'userLevel'];
}
