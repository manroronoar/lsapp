<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

     $todayS = $request->todayS;
     $todayE = $request->todayE;
     //$todayE = '2020-02-20';
     $tomonths  =  $request->tomonths . '%';
     

     $datashift = DB::table('kpi_shifts')->orderBy('Sh_Timestart', 'asc')->get();
  
     $todayS  = $todayS .' '.$datashift[0]->Sh_Timestart;
     $todayE  = date ("Y-m-d", strtotime("1 day", strtotime($todayE)));
     $todayE  = $todayE .' '. $datashift[0]->Sh_Timestart;  
    
     $datetime1 = date_create($request->todayS); 
     $datetime2 = date_create($request->todayE); 
     $interval = date_diff($datetime1, $datetime2); 
     $intervals =  $interval->d;

     // if($request->shift = 'All'){
     // $todayE = '';
     // $todayS  = date ("Y-m-d", strtotime("-1 day", strtotime($todayS)));
     // $todayS  = $todayS .' '.$datashift[0]->Sh_Timestart;
     // $todayE  = date ("Y-m-d", strtotime("1 day", strtotime($todayE)));
     // $todayE  = $todayE .' '. $datashift[0]->Sh_Timestart;  
      
     // return response()->json(['shift' => $datashift
     // ,'shifts' => $request->shift,
     // 'todayS' => $todayS,'todayE' => $todayE]);
     //} elseif($request->shift = 'A')  {
     //  $todayS  = $todayS .' '.$datashift[0]->Sh_Timestart;
     // $todayE  = date ("Y-m-d", strtotime("1 day", strtotime($todayE)));
     //  $todayE  = $todayE .' '. $datashift[0]->Sh_Timestart;  
     // }
     // elseif($request->shift = 'B')  {
     // $todayS  = $todayS .' '.$datashift[0]->Sh_Timestart;
     // $todayE  = date ("Y-m-d", strtotime("1 day", strtotime($todayE)));
     // $todayE  = $todayE .' '. $datashift[0]->Sh_Timestart;  
     //}

   



     $countmcMc_Number = kpi_mcs::select('Mc_Number')->distinct()->get();

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
     ->whereBetween('Re_Hs_E', [$todayS, $todayE]) 
     //->where('Re_Hs_S','like',$tomonths)
    // where  Re_Hs_S like('2019-12-%')
     ->get();

     $dataAY1 =  DB::table('kpi_report_kpis')
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
     ->where('Re_Location', '=', 'AY1')
     ->whereBetween('Re_Hs_E', [$todayS, $todayE])
    // ->where('Re_Hs_S','like',$tomonths)
     ->get();

     



     $dataAY2 =  DB::table('kpi_report_kpis')
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
     ->where('Re_Location', '=', 'AY2')
     ->whereBetween('Re_Hs_E', [$todayS, $todayE])
     //->where('Re_Hs_S','like',$tomonths)
     ->get();

     $dataAY3 =  DB::table('kpi_report_kpis')
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
     ->where('Re_Location', '=', 'AY3')
     ->whereBetween('Re_Hs_E', [$todayS, $todayE])
     //->where('Re_Hs_S','like',$tomonths)
     ->get();

     // $datachart =  DB::table('kpi_report_kpis')  
     // ->select(DB::raw('Re_Pr_Actual as item1, Re_Pr_Target as item2, DATE_FORMAT(Re_Hs_S,"%H:%i:%s")  as y '))   
     // ->whereBetween('Re_Hs_S', [$todayS, $todayE])
     //->where('Re_Hs_S','like',$tomonths)
     //->get();

      $datastatus= DB::table('kpi_getnodejsons')
        // ->select('Gn_node' ,DB::raw('MAX(Gn_tsupd) as Gn_tsupd'))
         ->select(DB::raw('Gn_node,MAX(Gn_tsupd) as Gn_tsupd,Gn_posbit,(CASE
           WHEN Gn_posbit = 1 THEN "Down"
           WHEN Gn_posbit = 2 THEN "Idle"
           WHEN Gn_posbit = 3 THEN "Setup"
           WHEN Gn_posbit = 4 THEN "P.M"
           WHEN Gn_posbit = 5 THEN "Running"
           WHEN Gn_posbit = 6 THEN "By Off"
           ELSE Gn_posbit
           END) as status'))
         ->groupBy('Gn_node');
       //  ->get();
    
        $datajoinstatus1 = DB::table('kpi_mcs')
           ->select('kpi_mcs.Mc_Number','kpi_mcs.mc_location','datastatus.Gn_node',DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'),'datastatus.status')
          //  ->select(DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'))
            ->joinSub($datastatus, 'datastatus', function ($join) {
                $join->on('kpi_mcs.Mc_Node', '=', 'datastatus.Gn_node');
            })
            ->where('kpi_mcs.mc_location','=','AY1')
            ->groupBy('kpi_mcs.Mc_Number')
            ->take(3)
            ->get();
     
        $datajoinstatus2 = DB::table('kpi_mcs')
            ->select('kpi_mcs.Mc_Number','kpi_mcs.mc_location','datastatus.Gn_node',DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'),'datastatus.status')
          //  ->select(DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'))
            ->joinSub($datastatus, 'datastatus', function ($join) {
                $join->on('kpi_mcs.Mc_Node', '=', 'datastatus.Gn_node');
            })
            ->where('kpi_mcs.mc_location','=','AY2')
            ->groupBy('kpi_mcs.Mc_Number')
            ->take(3)
            ->get();

        $datajoinstatus3 = DB::table('kpi_mcs')
            ->select('kpi_mcs.Mc_Number','kpi_mcs.mc_location','datastatus.Gn_node',DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'),'datastatus.status')
          //  ->select(DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'))
            ->joinSub($datastatus, 'datastatus', function ($join) {
                $join->on('kpi_mcs.Mc_Node', '=', 'datastatus.Gn_node');
            })
            ->where('kpi_mcs.mc_location','=','AY3')
            ->groupBy('kpi_mcs.Mc_Number')
            ->take(3)
            ->get();
            
        $countmcRe_McNumber = DB::table('kpi_mcs')
        ->select('kpi_mcs.Mc_Number','kpi_mcs.mc_location','datastatus.Gn_node',DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'),'datastatus.status')
      //  ->select(DB::raw('MAX(datastatus.Gn_tsupd) as Gn_tsupd'))
        ->joinSub($datastatus, 'datastatus', function ($join) {
            $join->on('kpi_mcs.Mc_Node', '=', 'datastatus.Gn_node');
        })     
        ->groupBy('kpi_mcs.Mc_Number')
        ->get();

        $countmcay1 = DB::table('kpi_mcs')->select(DB::raw('DISTINCT(Mc_Number),Mc_Location'))->where('Mc_Location','=','AY1')->get();
        $countmcay2 = DB::table('kpi_mcs')->select(DB::raw('DISTINCT(Mc_Number),Mc_Location'))->where('Mc_Location','=','AY2')->get();
        $countmcay3 = DB::table('kpi_mcs')->select(DB::raw('DISTINCT(Mc_Number),Mc_Location'))->where('Mc_Location','=','AY3')->get();
      
        $datasafety  = DB::table('kpi_safeties')->get();
        $datacustcom = DB::table('kpi_custcoms')->get();
        $arrays = ['price' => 100];

        for ($i = 0; $i > $intervals; $i++)
        {
        //  $arrays = Arr::prepend($array, $i);
       ////   $array = Arr::add(['name' => 'Desk'], 'price', $i);
         $arrays = ['price' => 100];

         $arrays = Arr::prepend($arrays, 'Desk', 'name');
        }
  
        $datachart =  DB::table('kpi_report_kpis')  
        ->select(DB::raw('sum(Re_Pr_Actual) as ac, sum(Re_Pr_Target) as tr,YEAR(Re_Hs_S) year, MONTH(Re_Hs_S) month, DAY(Re_Hs_S) day'))      
        //GROUP BY YEAR(Re_Hs_S), MONTH(Re_Hs_S) ,DAY(Re_Hs_S)
        //->where('year','=','2019')
        ->where('Re_Hs_E','like',$tomonths)
        ->groupBy('year','month','day')
        ->get();
  

     return response()->json(['result' => $data,
                              'dataay1' => $dataAY1,                     
                              'dataay2' => $dataAY2,
                              'dataay3' => $dataAY3,
                              'datajoinstatusAY1' => $datajoinstatus1,
                              'datajoinstatusAY2' => $datajoinstatus2,
                              'datajoinstatusAY3' => $datajoinstatus3,
                              'countmcay1' => $countmcay1,
                              'countmcay2' => $countmcay2,
                              'countmcay3' => $countmcay3,
                              'datachart' => $datachart,
                              'datasafety' => $datasafety,
                              'custcom' => $datacustcom,
                              'countmcMc_Number' => $countmcMc_Number,
                              'countmcRe_McNumber' => $countmcRe_McNumber,
                              'todayS' => $todayS,
                              'todayE' => $todayE,
                              'array'=> $arrays]);
    
     
    }
}
