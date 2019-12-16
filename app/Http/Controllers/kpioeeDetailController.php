<?php

namespace App\Http\Controllers;

use App\kpi_oee_detail;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_getnodejson;
use App\kpi_headerset;
use App\kpi_oeedetail;
use App\kpi_bittypedown;
use App\kpi_shift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use DB;
use DataTables;
use Validator;



class kpioeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // public function index(Request $request)
   public function index(Request $request)
    {
        $mcnumber =  $request->mcnumber;
        $datatypebit = kpi_bittypedown::latest()->get()->toArray();
        $listshift = kpi_shift::select('Sh_Name')->get();
              //  dd($datatypebit);
        return view('page.kpi_oee_detail')->with('mcnumberkey',$mcnumber)->with('datakey',$datatypebit)->with('listshift',$listshift);
    }
    public function readdata(Request $request)
    {
        
    
         //    return view('page.kpi_oee_detail');
  
    }
    
    public function indexread(Request $request)
    {
       // dd($request->namemc);
      // $mcnumbers =  $request->mcnumber;
     
       
      //  return view('page.kpi_oee_detail')->with('mcnumbers',$mcnumbers);

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
     * @param  \App\kpi_oee_detail  $kpi_oee_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    //public function show($mcnumber)
   // public function show($mcnumber)
    {
        //
       // dd($request->all);
     // $mcnumbers =  $request->mcnumber;
     // dd($mcnumber);
   //  $mcnumber;



    //  return view('page.kpi_oee_detail')->with('mcnumbers',$mcnumber);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_oee_detail  $kpi_oee_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(kpi_oee_detail $kpi_oee_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_oee_detail  $kpi_oee_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_oee_detail $kpi_oee_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_oee_detail  $kpi_oee_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(kpi_oee_detail $kpi_oee_detail)
    {
        //
    }
}
