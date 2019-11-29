<?php

namespace App\Http\Controllers;

use App\kpi_oee;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_getnodejson;
use App\kpi_headerset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use DataTables;
use Validator;

class kpioeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        date_default_timezone_set("Asia/Bangkok");
    
        // $format = '%Y-%m-%d %H:%M:%S';
             //$format = '%Y-%m-%d';
             //$strfc = strftime($format); 
          
             //$sumbit1 = kpi_getnodejson::
             //where('Gn_dmystr',$strfc)
             //->where('Gn_posbit',1)
             //->sum('Gn_sec');
             
 
              if($request->ajax())
               {
                 $tagged_project_item;
 
                 $data = kpi_headerset::select('Hs_Mc')->distinct()->get(); 
               
                   $countdata = count($data);
                   $datamcname;
                   $dataoee;
                   
                   foreach($data as $key=>$data)
                   {
                      $dataoee = DB::select('call oeemc_sto(?)',[$data->Hs_Mc]);
                       $tagged_project_item[] = array(
                           'mc_number'    => ($data->Hs_Mc),
                           'oee'         => ($dataoee[0]->oee_),         
                       );
                   };
                   return DataTables::of($tagged_project_item)   
 
                  //$data = kpi_headerset::select('Hs_Mc')->distinct()->get();    
                 // return DataTables::of($data)    
             
                // $memus[0]['name'];
                 //  ->addIndexColumn()
                   ->addColumn('action', function($tagged_project_item){
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                    // return $btn;
                     $button = '<button type="button" name="getmcname" id='.$tagged_project_item['mc_number'].' class="getmcname btn btn-primary btn-sm">VIEW MC. '.$tagged_project_item['mc_number'].'</button>';
                  //   $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id='.$tagged_project_item['mc_name'].' class="delete btn btn-danger btn-sm">Delete</button>';
                   // $button = ;
                    return $button;
                 })
              
 
                   ->make(true);     
               }
       
              return view('page.kpi_oee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_oee  $kpi_oee
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_oee $kpi_oee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_oee  $kpi_oee
     * @return \Illuminate\Http\Response
     */
    public function edit(kpi_oee $kpi_oee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_oee  $kpi_oee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_oee $kpi_oee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_oee  $kpi_oee
     * @return \Illuminate\Http\Response
     */
    public function destroy(kpi_oee $kpi_oee)
    {
        //
    }
}
