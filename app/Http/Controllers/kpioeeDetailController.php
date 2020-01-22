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
              // dd($datatypebit);
        return view('page.kpi_oee_detail')->with('mcnumberkey',$mcnumber)->with('datakey',$datatypebit)->with('listshift',$listshift);
    }

    public function index2(Request $request)
    {
        $mcnumber =  $request->mcnumber;
        $datatypebit = kpi_bittypedown::latest()->get()->toArray();
        $listshift = kpi_shift::select('Sh_Name')->get();
              // dd($datatypebit);
        return view('page.kpi_oee_detail2')->with('mcnumberkey',$mcnumber)->with('datakey',$datatypebit)->with('listshift',$listshift);
    }


    public function readdata2(Request $request)
    {
        $shift = '';
       
        $yyyy= $request->yyyy;
        $mmmm= $request->mmmm;
        $dddd= $request->dddd;    
        $yyyye= $request->yyyye;
        $mmmme= $request->mmmme;
        $dddde= $request->dddde;    
        $shift = $request->shift;
        $typeday = $request->typeday;
       // $searchreport = $request->searchreport;
     



        if( $typeday == 'D')
        {
            if ($shift == 'All')
            {
                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' 00:00:00';
                $dateE =  $yyyy ."-". $mmmm ."-". $dddd .' 23:59:59';

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
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                          'DateS' => $dateS,
                                          'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);
            } 
            else if($shift == 'A')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;

                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateE;
           


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
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                          'DateS' => $dateS,
                                          'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,                                   
                                         'shiftdate' =>  $shiftAdateS]);

            }

            else if($shift == 'B')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

            //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
                 $dateEE =  $yyyy ."-". $mmmm ."-". $dddd;
               //  date('Y-m-d',strtotime($dateEE."+1 day"));
                $dateS =  $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =   date('Y-m-d',strtotime($dateEE."+1 day")).' '.$shiftAdateE;
           

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
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                                                          
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,
                                         'dateS' => $dateS ,
                                         'dateE' => $dateE]);
            }
        }
        else if ($typeday == 'M')
        {
            if($shift == 'All')
            {
                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' 00:00:00';
                $dateE =  $yyyye ."-". $mmmme ."-". $dddde .' 23:59:59';

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
             //   DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);

            }
            else if($shift == 'A')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

            //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
                 $dateEE =  $yyyy ."-". $mmmm ."-". $dddd;
               //  date('Y-m-d',strtotime($dateEE."+1 day"));
                $dateS =   $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =   $yyyye ."-". $mmmme ."-". $dddde.' '.$shiftAdateE;

               // $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' 00:00:00';
               // $dateE =  $yyyye ."/". $mmmme ."/". $dddde .' 23:59:59';

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);


            }
            else if($shift == 'B')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

           //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
             $dateEE =  $yyyye ."-". $mmmme ."-". $dddde;
           //  date('Y-m-d',strtotime($dateEE."+1 day"));
             $dateS =  $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
             $dateE =   date('Y-m-d',strtotime($dateEE."+1 day")).' '.$shiftAdateE;

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    



              $testdata =  DB::table('kpi_report_kpis')
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
                                  SUM(Re_Count_Bit8) as C8,
                                  DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'
                                 ))
              ->where('Re_McNumber', '=', $request->varmc)
              ->where('Re_Shift', '=', $shift)
              ->whereBetween('Re_Hs_S', [$dateS, $dateE])
              ->groupBy('y')
              ->get();


                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'testdata' => $testdata,
                                         'shift' => $shift]);

            }

        }
        
    
         //    return view('page.kpi_oee_detail');
  
    }

    public function readdata(Request $request)
    {
        $shift = '';
       
        $yyyy= $request->yyyy;
        $mmmm= $request->mmmm;
        $dddd= $request->dddd;    
        $yyyye= $request->yyyye;
        $mmmme= $request->mmmme;
        $dddde= $request->dddde;    
        $shift = $request->shift;
        $typeday = $request->typeday;
       // $searchreport = $request->searchreport;
     



        if( $typeday == 'D')
        {
            if ($shift == 'All')
            {
                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' 00:00:00';
                $dateE =  $yyyy ."-". $mmmm ."-". $dddd .' 23:59:59';

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
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                          'DateS' => $dateS,
                                          'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);
            } 
            else if($shift == 'A')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;

                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateE;
           


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
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                          'DateS' => $dateS,
                                          'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,                                   
                                         'shiftdate' =>  $shiftAdateS]);

            }

            else if($shift == 'B')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

            //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
                 $dateEE =  $yyyy ."-". $mmmm ."-". $dddd;
               //  date('Y-m-d',strtotime($dateEE."+1 day"));
                $dateS =  $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =   date('Y-m-d',strtotime($dateEE."+1 day")).' '.$shiftAdateE;
           

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
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
                ->select(DB::raw('Re_Pr_Actual as a ,DATE_FORMAT(Re_Hs_S,"%H:%i:%s") as y '))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                                                          
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift,
                                         'dateS' => $dateS ,
                                         'dateE' => $dateE]);
            }
        }
        else if ($typeday == 'M')
        {
            if($shift == 'All')
            {
                $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' 00:00:00';
                $dateE =  $yyyye ."-". $mmmme ."-". $dddde .' 23:59:59';

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
             //   DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);

            }
            else if($shift == 'A')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

            //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
                 $dateEE =  $yyyy ."-". $mmmm ."-". $dddd;
               //  date('Y-m-d',strtotime($dateEE."+1 day"));
                $dateS =   $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
                $dateE =   $yyyye ."-". $mmmme ."-". $dddde.' '.$shiftAdateE;

               // $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' 00:00:00';
               // $dateE =  $yyyye ."/". $mmmme ."/". $dddde .' 23:59:59';

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);


            }
            else if($shift == 'B')
            {
                $shiftdate = DB::table('kpi_shifts')
                ->select(DB::raw('Sh_Timestart,Sh_Timestop'))
                ->Where('Sh_Name','=',$shift)->get();

                $shiftAdateS = $shiftdate[0]->Sh_Timestart;
                $shiftAdateE = $shiftdate[0]->Sh_Timestop;
               

           //    $dateS =  $yyyy ."/". $mmmm ."/". $dddd .' '.$shiftAdateS;
             $dateEE =  $yyyye ."-". $mmmme ."-". $dddde;
           //  date('Y-m-d',strtotime($dateEE."+1 day"));
             $dateS =  $dateS =  $yyyy ."-". $mmmm ."-". $dddd .' '.$shiftAdateS;
             $dateE =   date('Y-m-d',strtotime($dateEE."+1 day")).' '.$shiftAdateE;

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
                                    SUM(Re_Count_Bit8) as C8'
                                   ))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
               // ->groupBy('gb')
                ->get();
        
                $datatoChart =  DB::table('kpi_report_kpis')
             //  ->select(DB::raw('Re_Pr_Actual as a ,Re_Hs_s as y '))
            //    DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as gb

                ->select(DB::raw('sum(Re_Pr_Actual) as a ,DATE_FORMAT(Re_Hs_S,"%Y/%m/%d") as y'))
                ->where('Re_McNumber', '=', $request->varmc)
                ->where('Re_Shift', '=', $shift)
                ->whereBetween('Re_Hs_S', [$dateS, $dateE])
                ->groupBy('y')
                ->get();
              //$datatoChart  = '0';
                    
                return response()->json(['Result' => $data,                  
                                         'DateS' => $dateS,
                                         'DateE' => $dateE,
                                         'Mcnumber' => $request->varmc,
                                         'DatatoChart' => $datatoChart,
                                         'shift' => $shift]);

            }

        }
        
    
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
