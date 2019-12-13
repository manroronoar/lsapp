<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\kpi_mcs;
use App\User;
use App\kpi_node;
use App\kpi_headerset;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\kpi_monitormc;


class kpidashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countheaderset = kpi_headerset::count();
        $countnode = kpi_node::count();
        $countmcs = kpi_mcs::select('Mc_Number')->distinct()->get();
        $countmc = count($countmcs);

        return view('page.kpi')
        ->with('countheaderset',$countheaderset)
        ->with('countmc',$countmc)
        ->with('countnode',$countnode);   
    }
    public function readdata()
    {
        //
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
