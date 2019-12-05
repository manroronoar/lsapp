<?php

namespace App\Http\Controllers;

use App\kpi_monitormc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_location;
use DB;
use DataTables;
use Validator;

class kpimonitormcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kpi_monitormc.blade
        //$data =  kpi_mcs::distinct()->get(['Mc_Number']);
        //dd($data);
        return view('page.kpi_monitormc');
    }

    public function readdata()
    {
    
     //$data =  DB::table('kpi_mcs')->distinct()->get(['Mc_Number']);
     $data =  kpi_mcs::distinct()->get(['Mc_Number']);

     return response()->json(['result' => $data]);
  
     
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
     * @param  \App\kpi_monitormc  $kpi_monitormc
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_monitormc $kpi_monitormc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_monitormc  $kpi_monitormc
     * @return \Illuminate\Http\Response
     */
    public function edit(kpi_monitormc $kpi_monitormc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_monitormc  $kpi_monitormc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_monitormc $kpi_monitormc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_monitormc  $kpi_monitormc
     * @return \Illuminate\Http\Response
     */
    public function destroy(kpi_monitormc $kpi_monitormc)
    {
        //
    }
}
