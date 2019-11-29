<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_getnodejson;
use App\kpi_headerset;
use DB;
use DataTables;
use Validator;

class kpioee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // sum type downtime
        //1 MCDOWN //2 MCIDLE//3 MCSETUP //4 MCPM//5 MCRUNING//6 BUTOFF //7 //8
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
                          'mc_name'    => ($data->Hs_Mc),
                          'oee'         => ($dataoee[0]->oee_),         
                      );
                  };
                  return DataTables::of($tagged_project_item)   

                 //$data = kpi_headerset::select('Hs_Mc')->distinct()->get();    
                // return DataTables::of($data)    
            
               // $memus[0]['name'];
                  
                  ->addColumn('action', function($row){
                    $button = '<button type="button" name="getmcname" id='.$row->mc_name.' class="getmcname btn btn-primary btn-sm">view node</button>';
                   // $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->Hs_Mc.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
             

                  ->make(true);     
              }
      
             return view('page.kpi_oee');
       
    }
    public function indexdetail(Request $request)
    {       
        return view('page.mcs');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
