<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kpi_mcs;
use DB;

class CalldatanodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('calldatanode');
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
        $countmc = kpi_mcs::select('Mc_Number')->distinct()->get();

        foreach($countmc as $key=>$countmc)
        {
           $dataoee = DB::select('call oeemc_sto(?)',[$data->Hs_Mc]);
            $tagged_project_item[] = array(
                'mc_number'    => ($data->Hs_Mc),
                'oee'         => ($dataoee[0]->oee_),         
            );
        };

        $dateS = '';
        $dateE = '';

    //   SELECT Mc_Number,Nd_Number FROM kpi_mcs
    //   join kpi_nodes on kpi_mcs.Mc_Node = kpi_nodes.Nd_Number
        $for_data = array(
       //     'Gn_id' =>  '35',  
            'Gn_node' =>  'N020',
        );
    //    kpi_mcs::create($form_data);
       //dd($for_data);
   //  DB::table('kpi_getnodejsons')->insert($for_data);
           dd($countmc);
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
