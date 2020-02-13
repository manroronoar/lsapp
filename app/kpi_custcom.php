<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_custcom extends Model
{
    protected $fillable = [
        'Cc_Mcnumber',
        'Cc_Namecust',
        'Cc_Name',
        'Cc_Type',
        'Cc_Remark',
        'Cc_User'
       ];
}
