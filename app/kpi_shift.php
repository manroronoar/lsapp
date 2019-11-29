<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_shift extends Model
{
    protected $fillable = [
        'Sh_Name',
        'Sh_Type',
        'Sh_Timestart',
        'Sh_Timestop',
        'Sh_Status',
        'Sh_User'
       ];
}
