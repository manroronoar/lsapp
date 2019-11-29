<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_setupcode extends Model
{
    protected $fillable = [
        'Sc_Number', 
        'Sc_Name', 
        'Sc_Remark', 
        'Sc_Status', 
        'Sc_User'
       ];
}
