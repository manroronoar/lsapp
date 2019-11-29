<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_mcs extends Model
{
    protected $fillable = [
        'Mc_Number',
        'Mc_Node',
        'Mc_Name',
        'Mc_Type',
        'Mc_Brand',
        'Mc_Location',
        'Mc_User'
       ];
}
