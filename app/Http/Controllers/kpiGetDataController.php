<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kpi_monitormc;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_location;
use App\kpi_shift;
use DB;
use DataTables;
use Validator;


class kpiGetDataController extends Controller
{
    public function readdata(Request $request)
    {
      //  todayS + ' ' +todayE
     $todayS = $request->todayS;
     $todayE = $request->todayE;
    // $data =  kpi_mcs::distinct()->get(['Mc_Number']);
    $countmcMc_Number = kpi_mcs::select('Mc_Number')->distinct()->get();
    $countmcRe_McNumber = DB::table('kpi_report_kpis')->select(DB::raw('distinct(Re_McNumber)'))->whereBetween('Re_Hs_S', [$todayS, $todayE])->get();
   //  dd($countmcstotal);
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
    // ->where('Re_McNumber', '=', $request->varmc)
     ->whereBetween('Re_Hs_S', [$todayS, $todayE])
     ->get();


        $datachart =  DB::table('kpi_report_kpis')  
        ->select(DB::raw('Re_Pr_Actual as item1, Re_Pr_Target as item2, DATE_FORMAT(Re_Hs_S,"%H:%i:%s")  as y '))   
        ->whereBetween('Re_Hs_S', [$todayS, $todayE])
        ->get();

     return response()->json(['result' => $data,
                              'datachart' => $datachart,
                              'countmcMc_Number' => $countmcMc_Number,
                              'countmcRe_McNumber' => $countmcRe_McNumber,
                              'todayS' => $todayS,
                              'todayE' => $todayE]);
    
     
    }
}
