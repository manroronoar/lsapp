<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_downcode extends Model
{
    //// `Dc_Number`, `Dc_Type`, `Dc_Name`, `Dc_Remark`, `Dc_Status`, `Dc_User`
    protected $fillable = [
        'Dc_Number',
        'Dc_Type',
        'Dc_Name',
        'Dc_Remark', 
        'Dc_Status',
        'Dc_User'
       ];
}
