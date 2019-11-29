<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_node extends Model
{
    //
    protected $fillable = [
        'Nd_Number', 
        'Nd_Name', 
        'Nd_Detail', 
        'Nd_Status', 
        'Nd_User'
       ];
   
}
