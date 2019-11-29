<?php

namespace App\Http\Controllers;

use App\kpi_getnodejson;
use Illuminate\Http\Request;
use Redirect,Response;


class GetnodejsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('http://34.87.86.224:4004/read/n01/40/');
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
      $data = $request->only('_id','astid','iobit','ts','dmystr','hmstr','sec','tsupd');
      $test['token'] = time();
      $test['data'] = json_encode($data);
      kpi_getnodejson::insert($test);
      return Redirect::to("laravel-json")->withSuccess('Great! Successfully store data in json format in datbase');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_getnodejson  $kpi_getnodejson
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_getnodejson $kpi_getnodejson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_getnodejson  $kpi_getnodejson
     * @return \Illuminate\Http\Response
     */
    public function edit(kpi_getnodejson $kpi_getnodejson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_getnodejson  $kpi_getnodejson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_getnodejson $kpi_getnodejson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_getnodejson  $kpi_getnodejson
     * @return \Illuminate\Http\Response
     */
    public function destroy(kpi_getnodejson $kpi_getnodejson)
    {
        //
    }
}
