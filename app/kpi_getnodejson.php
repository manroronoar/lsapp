<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpi_getnodejson extends Model
{
    protected $fillable = [
        'Gn_id',
        'Gn_node',
        'Gn_astid',
        'Gn_iobit',
        'Gn_posbit',
        'Gn_ts', 
        'Gn_downcode',
        'Gn_remark',
        'Gn_dmystr',
        'Gn_hmstr',
        'Gn_sec',
        'Gn_tsupd'
       ];
}
