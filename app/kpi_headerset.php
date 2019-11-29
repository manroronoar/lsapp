<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_headerset extends Model
{
    protected $fillable = [
        'Hs_Mc',
        'Hs_Drawing',
        'Hs_TargetHour',
        'Hs_Shift',
        'Hs_Customer',
        'Hs_Employee'   
       ];

}
