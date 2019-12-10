<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_getnodejson;
use App\kpi_headerset;
use App\kpi_oeedetail;
use DB;
use DataTables;
use Validator;

class kpioeedetail extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$input = $request->all();
       $mcname = $request->mc;
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

       //dd($tagged_project_item);
      // dd($tagged_project_item[0]['mc_name']);
       //print($tagged_project_item);
      // print($tagged_project_item[0]['mc_name']);

      $mcnumber = $request->valuesmcs;
      if ( $mcnumber = '')
      {
          $data =  kpi_mcs::distinct()
          ->get(['Mc_Number']);
      }
      else
      {
          $data =  kpi_mcs::distinct()
          ->where('Mc_Number','=',$request->valuesmcs)
          ->get(['Mc_Number']);
      }
      dd($data);
    // return response()->json(['result' => $data]);

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
     * @param  \App\kpi_oeedetail  $kpi_oeedetail
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_oeedetail $kpi_oeedetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_oeedetail  $kpi_oeedetail
     * @return \Illuminate\Http\Response
     */
    public function edit(kpi_oeedetail $kpi_oeedetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_oeedetail  $kpi_oeedetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_oeedetail $kpi_oeedetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_oeedetail  $kpi_oeedetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(kpi_oeedetail $kpi_oeedetail)
    {
        //
    }
}
