<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_safety extends Model
{
    protected $fillable = [
        'Sf_Date',
        'Sf_Enid',
        'Sf_Name',
        'Sf_TypeSafetie',
        'Sf_Remark',
        'Sf_User'
       ];
}
