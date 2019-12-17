<?php

namespace App\Http\Controllers;

use App\kpi_monitormc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_location;
use App\kpi_shift;
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
    public function index(Request $request)
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
    public function readdataforoeebymc(Request $request)
    {   
        $yyyy= $request->yyyy;
        $mmmm= $request->mmmm;
        $dddd= $request->dddd;
        $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' 00:00:00';
        $dateE =  $yyyy ."/". $mmmm ."/". $dddd .' 23:59:59';
        $shift = $request->shift;
        $searchreport = $request->searchreport;
     



        if ($searchreport = 'Day')
        {
            if ($shift = 'All')
            {
                $data =  DB::table('kpi_report_kpis')
                ->select(DB::raw('count(id) as countrow,
                                    SUM(Re_Ar_Target) as Art,
                                    SUM(Re_Ar_Actual) as Ara,
                                    SUM(Re_Pr_Target) as Prt,
                                    SUM(Re_Pr_Actual) as Pra,
                                    SUM(Re_Oee_Actual) as Oeea,
                                    SUM(Re_Sum_Sec_Bit1) as S1,
                                    SUM(Re_Count_Bit1) as C1,
                                    SUM(Re_Sum_Sec_Bit2) as S2,
                                    SUM(Re_Count_Bit2) as C2,
                                    SUM(Re_Sum_Sec_Bit3) as S3,
                                    SUM(Re_Count_Bit3) as C3,
                                    SUM(Re_Sum_Sec_Bit4) as S4,
                                    SUM(Re_Count_Bit4) as C4,
                                    SUM(Re_Sum_Sec_Bit5) as S5,
                                    sum(Re_Count_Bit5) as C5,
                                    SUM(Re_Sum_Sec_Bit6) as S6, 
                                    SUM(Re_Count_Bit6) as C6, 
                                    SUM(Re_Sum_Sec_Bit7) as S7,
                                    SUM(Re_Count_Bit7) as C7,
                                    SUM(Re_Sum_Sec_Bit8) as S8,
                                    SUM(Re_Count_Bit8) as C8'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
               ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'Datetime' => $dateS,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,
                                         'searchreport' => $searchreport]);
            } 
            else if($shift = 'A')
            {



                $data =  DB::table('kpi_report_kpis')
                ->select(DB::raw('count(id) as countrow,
                                    SUM(Re_Ar_Target) as Art,
                                    SUM(Re_Ar_Actual) as Ara,
                                    SUM(Re_Pr_Target) as Prt,
                                    SUM(Re_Pr_Actual) as Pra,
                                    SUM(Re_Oee_Actual) as Oeea,
                                    SUM(Re_Sum_Sec_Bit1) as S1,
                                    SUM(Re_Count_Bit1) as C1,
                                    SUM(Re_Sum_Sec_Bit2) as S2,
                                    SUM(Re_Count_Bit2) as C2,
                                    SUM(Re_Sum_Sec_Bit3) as S3,
                                    SUM(Re_Count_Bit3) as C3,
                                    SUM(Re_Sum_Sec_Bit4) as S4,
                                    SUM(Re_Count_Bit4) as C4,
                                    SUM(Re_Sum_Sec_Bit5) as S5,
                                    sum(Re_Count_Bit5) as C5,
                                    SUM(Re_Sum_Sec_Bit6) as S6, 
                                    SUM(Re_Count_Bit6) as C6, 
                                    SUM(Re_Sum_Sec_Bit7) as S7,
                                    SUM(Re_Count_Bit7) as C7,
                                    SUM(Re_Sum_Sec_Bit8) as S8,
                                    SUM(Re_Count_Bit8) as C8'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
               ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'Datetime' => $dateS,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,
                                         'searchreport' => $searchreport]);

            }
            else if($shift = 'B')
            {

            }
        }
       // $data =  DB::table('kpi_report_kpis')->whereBetween('Re_Hs_S', [$dateS, $dateE])->get();

       
    }
    public function readdataforoeeChart(Request $request)
    {   


    }
    public function Chart()
    {

     $data =  kpi_mcs::distinct()->get(['Mc_Number']);
     $sumoutput = '2582';
   //  $sumtayg = 'ss';
   //  $sumoee = '98.22';
   //  $sumday = '30';
     //return response()->json(['result' => $data]);
     return response()->json(['result' => $data,'sumoutput' => $sumoutput]);
   //  ['sumtarget' => $sumtayg],
   //  ['sumoee' => $sumoee],
   //  ['sumday' => $sumday]);
    }

    public function readdatabymc(Request $request)
    {
    
     //$data =  DB::table('kpi_mcs')->distinct()->get(['Mc_Number']);
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
     return response()->json(['result' => $data]);
  
     
    }

    public function readdataindex(Request $request)
   // public function readdataindex()
    {
    
        if($request->ajax())
        {
            $data = kpi_mcs::select('Mc_Number','Mc_Node')
            ->where('Mc_Number','=',$request->valuemc)
            ->get();  
            return DataTables::of($data) 
            ->addColumn('action', function($data){
                $button = '<button type="button" name="node" id="'.$data->Mc_Node.'" class="node btn btn-warning btn-sm">link '.$data->Mc_Node.'</button>';
               // $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->Mc_Node.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
       }
    
        return view('page.kpi_monitormc');
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
