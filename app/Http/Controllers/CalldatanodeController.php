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
        date_default_timezone_set("Asia/Bangkok");
        $test_item;
        //'2020-01-28 00:00:00'
        $dateD = '2020-01-28';
        $dateGet = date("Y-m-d");
        $dateT = date("H:m:s");
        $dateS = '';
        $dateE = '';

        $mcnumber ;   
        $pr_by_hour = 0;
        $oee_tg = 0;  $oee_ac = 0; 
        $pr_tg = 0; $pr_ac = 0; 
        $ar_tg = 3600; $ar_ac = 0; 
        $qr_tg = 0; $qr_ac =0; 
        $shifts = '';  $location = '';
        $sumsecbit1 = 0;    $countbit1 = 0;   $bit1 = 1;    $fq1 = '';
        $sumsecbit2 = 0;    $countbit2 = 0;   $bit2 = 2;    $fq2 = '';
        $sumsecbit3 = 0;    $countbit3 = 0;   $bit3 = 3;    $fq3 = '';
        $sumsecbit4 = 0;    $countbit4 = 0;   $bit4 = 4;    $fq4 = '';
        $sumsecbit5 = 0;    $countbit5 = 0;   $bit5 = 5;    $fq5 = '';
        $sumsecbit6 = 0;    $countbit6 = 0;   $bit6 = 6;    $fq6 = '';
        $sumsecbit7 = 0;    $countbit7 = 0;   $bit7 = 5;    $fq7 = '';
        $sumsecbit8 = 0;    $countbit8 = 0;   $bit8 = 6;    $fq8 = '';
        
       

       // dd($dateT);
       
      if ($dateT >= '00:00:00' && $dateT <= '01:59:59')
      {
        $dateS = '23:00:00';
        $dateE = '23:59:59';
        $dateD  = date ("Y-m-d", strtotime("-1 day", strtotime($dateGet)));
     
      }
      else if ($dateT >= '01:00:00' && $dateT <= '02:59:59')
      {
        $dateS = '00:00:00';
        $dateE = '00:59:59';
      }
      else if ($dateT >= '02:00:00' && $dateT <= '03:59:59')
      {
        $dateS = '01:00:00';
        $dateE = '01:59:59';
      }
      else if ($dateT >= '03:00:00' && $dateT <= '03:59:59')
      {
        $dateS = '02:00:00';
        $dateE = '02:59:59';
      }
      else if ($dateT >= '04:00:00' && $dateT <= '04:59:59')
      {
        $dateS = '03:00:00';
        $dateE = '03:59:59';
      }
      else if ($dateT >= '05:00:00' && $dateT <= '05:59:59')
      {
        $dateS = '04:00:00';
        $dateE = '04:59:59';
      }
      else if ($dateT >= '06:00:00' && $dateT <= '06:59:59')
      {
        $dateS = '05:00:00';
        $dateE = '05:59:59';
      }
      else if ($dateT >= '07:00:00' && $dateT <= '07:59:59')
      {
        $dateS = '06:00:00';
        $dateE = '06:59:59';
      }
      else if ($dateT >= '08:00:00' && $dateT <= '08:59:59')
      {
        $dateS = '07:00:00';
        $dateE = '07:59:59';
      }
      else if ($dateT >= '09:00:00' && $dateT <= '09:59:59')
      {
        $dateS = '08:00:00';
        $dateE = '08:59:59';
      }
      else if ($dateT >= '10:00:00' && $dateT <= '10:59:59')
      {
        $dateS = '09:00:00';
        $dateE = '09:59:59';
      }
      else if ($dateT >= '11:00:00' && $dateT <= '11:59:59')
      {
        $dateS = '10:00:00';
        $dateE = '10:59:59';
      }
      else if ($dateT >= '12:00:00' && $dateT <= '12:59:59')
      {
        $dateS = '11:00:00';
        $dateE = '11:59:59';
      }
      else if ($dateT >= '13:00:00' && $dateT <= '13:59:59')
      {
        $dateS = '12:00:00';
        $dateE = '12:59:59';
      }
      else if ($dateT >= '14:00:00' && $dateT <= '14:59:59')
      {
        $dateS = '13:00:00';
        $dateE = '13:59:59';
      }
      else if ($dateT <= '15:00:00' && $dateT <= '15:59:59')
      {
        $dateS = '14:00:00';
        $dateE = '14:59:59';
      }
      else if ($dateT >= '16:00:00' && $dateT <= '16:59:59')
      {
        $dateS = '15:00:00';
        $dateE = '15:59:59';
      }
      else if ($dateT >= '17:00:00' && $dateT <= '17:59:59')
      {
        $dateS = '16:00:00';
        $dateE = '16:59:59';
      }
      else if ($dateT >= '18:00:00' && $dateT <= '18:59:59')
      {
        $dateS = '17:00:00';
        $dateE = '17:59:59';
      }
      else if ($dateT >= '19:00:00' && $dateT <= '19:59:59')
      {
        $dateS = '18:00:00';
        $dateE = '18:59:59';
      }
      else if ($dateT >= '20:00:00' && $dateT <= '20:59:59')
      {
        $dateS = '19:00:00';
        $dateE = '19:59:59';
      }
      else if ($dateT >= '21:00:00' && $dateT <= '21:59:59')
      {
        $dateS = '20:00:00';
        $dateE = '20:59:59';
      }
      else if ($dateT >= '22:00:00' && $dateT <= '22:59:59')
      {
        $dateS = '21:00:00';
        $dateE = '21:59:59';
      }
      else if ($dateT >= '23:00:00' && $dateT <= '23:59:59')
      {
        $dateS = '22:00:00';
        $dateE = '22:59:59';
      }

  
              //ar เวลา
              //pr จำนวน
              //qr oee

        $countmc = kpi_mcs::select('Mc_Number')->distinct()->get();
     
        foreach($countmc as $key=>$countmc)
          {
       
          $mcnumber = $countmc['Mc_Number'];
          $datatroee  = DB::table('kpi_setqualities')->select('Sq_Fixqualitie')->where('Sq_Mc', '=',$mcnumber )->get();   
          if(count($datatroee) >= 1)
          {
            $oee_tg  =  $datatroee[0]->Sq_Fixqualitie;
          }
          
          $datalocation = DB::table('kpi_mcs')->select('Mc_Location')->where('Mc_Number', '=',$mcnumber )->get();   
          if(count( $datalocation) >= 1)
          {
            $location =  $datalocation[0]->Mc_Location;
          }
       
          $datatrop = DB::table('kpi_headersets')->select('Hs_TargetHour')->where('Hs_Mc', '=',$mcnumber )->get(); 
          if(count($datatrop) >= 1)
          {
            $tr_tg = $datatrop[0]->Hs_TargetHour;
            $pr_by_hour =  number_format(($tr_tg / 24));
          }
         
         

    

          $msmcnode = DB::table('kpi_mcs')
          ->join('kpi_nodes', 'kpi_mcs.Mc_node', '=', 'kpi_nodes.Nd_Number')
          ->select('kpi_nodes.Nd_Number', 'kpi_mcs.Mc_Number')
          ->where('kpi_mcs.Mc_Number', '=', $countmc->Mc_Number);
          //->where('kpi_mcs.Mc_Number', '=','mc001');
          //  ->get();

          //testdata
            $dateS = '00:00:00';
            $dateE = '23:59:59';

          $datasumbit = DB::table('kpi_getnodejsons')
            ->joinSub($msmcnode, 'msmcnode', function ($join) use ($dateD,$dateS,$dateE) {
                //$dateD = '2020-01-28';
                $join->on('kpi_getnodejsons.Gn_Node', '=', 'msmcnode.Nd_Number');
                $join->where('kpi_getnodejsons.Gn_dmystr', '=',$dateD);
                $join->whereBetween('kpi_getnodejsons.Gn_hmstr',[$dateS,$dateE]); })
          //mc_number,Gn_posbit,count(Gn_posbit) as countposbit,sum(gn_sec) as sumsec,sum(Gn_fixqualitie) as sumfixqualitie
          //->select('msmcnode.Mc_Number','msmcnode.Nd_Number','kpi_getnodejsons.','','','','kpi_getnodejsons.Gn_hmstr')
          ->select(DB::raw('msmcnode.Mc_Number,
          kpi_getnodejsons.Gn_posbit,
          count(kpi_getnodejsons.Gn_posbit) as Countposbit,
          sum(kpi_getnodejsons.Gn_sec) as sumsec,
          sum(kpi_getnodejsons.Gn_fixqualitie) as sumfix'))
          ->groupBy('kpi_getnodejsons.Gn_posbit')
          ->get(); 
        
              foreach($datasumbit as $key=>$datasumbit)
              {
                switch ($datasumbit->Gn_posbit) {
                  case 1:
                      $sumsecbit1 = $datasumbit->sumsec;
                      $countbit1 = $datasumbit->Countposbit;
                      $fq1 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 2:
                      $sumsecbit2 = $datasumbit->sumsec;
                      $countbit2 = $datasumbit->Countposbit;
                      $fq2 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 3:  
                      $sumsecbit3 = $datasumbit->sumsec;
                      $countbit3 = $datasumbit->Countposbit;
                      $fq3 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 4:
                      $sumsecbit4 = $datasumbit->sumsec;
                      $countbit4 = $datasumbit->Countposbit;
                      $fq4 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 5:
                      $sumsecbit5 = $datasumbit->sumsec;
                      $countbit5 = $datasumbit->Countposbit;
                      $fq5 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 6:
                      $sumsecbit6 = $datasumbit->sumsec;
                      $countbit6 = $datasumbit->Countposbit;
                      $fq6 = ($datasumbit->sumfix/$datasumbit->Countposbit);
                      break;
                  case 7:
                    // $sumsecbit1 == $datasumbit->sumsec;
                    // $countbit1 == $datasumbit->Countposbit;
                      break;
                  case 8:
                    //  $sumsecbit1 == $datasumbit->sumsec;
                    //  $countbit1 == $datasumbit->Countposbit;
                      break;   
                  default:
                  
              }

           $ar_ac = $sumsecbit1 + $sumsecbit2 +  $sumsecbit3 + $sumsecbit4 + $sumsecbit5 +$sumsecbit6  + $sumsecbit7 + $sumsecbit8 ;
        
          };      
          print_r('  bit1 :'. $bit1 .'  sumsecbit1 :' .$sumsecbit1 .'  countbit1 :' .$countbit1.'  fq1 :' .$fq1 .'<br/>'
          .'  bit2 :'. $bit2 .'  sumsecbit2 :' .$sumsecbit2.'  countbit2 :' .$countbit2.'  fq2 :' .$fq2 .'<br/>'
          .'  bit3 :'. $bit3 .'  sumsecbit3 :' .$sumsecbit3.'  countbit3 :' .$countbit3.'  fq3 :' .$fq3 .'<br/>'
          .'  bit4 :'. $bit4 .'  sumsecbit4 :' .$sumsecbit4.'  countbit4 :' .$countbit4.'  fq4 :' .$fq4 .'<br/>'
          .'  bit5 :'. $bit5 .'  sumsecbit5 :' .$sumsecbit5.'  countbit5 :' .$countbit5.'  fq5 :' .$fq5 .'<br/>'
          .'  bit6 :'. $bit6 .'  sumsecbit6 :' .$sumsecbit6.'  countbit6 :' .$countbit6.'  fq6 :' .$fq6 .'<br/>' );

         DB::table('kpi_report_kpis')->insert(
          array('Re_McNumber' => $mcnumber, 
          'Re_Ar_Target' => $ar_tg,
          'Re_Ar_Actual' =>  $ar_ac,

          'Re_Pr_Target' => $pr_tg,
          'Re_Pr_Actual' => $pr_by_hour,

          'Re_Qr_Target' => $oee_tg,
         //'Re_Qr_Actual' => 0,

          'Re_Oee_Target' => $oee_tg,
          'Re_Oee_Actual' => 0,

          'Re_Count_Bit1' => $countbit1,
          'Re_Sum_Sec_Bit1' => $sumsecbit1,

          'Re_Count_Bit2' => $countbit2,
          'Re_Sum_Sec_Bit2' => $sumsecbit2,

          'Re_Count_Bit3' => $countbit3,
          'Re_Sum_Sec_Bit3' => $sumsecbit3,

          'Re_Count_Bit4' => $countbit4,
          'Re_Sum_Sec_Bit4' => $sumsecbit4,

          'Re_Count_Bit5' => $countbit5,
          'Re_Sum_Sec_Bit5' => $sumsecbit5,

          'Re_Count_Bit6' => $countbit6,
          'Re_Sum_Sec_Bit6' => $sumsecbit6,

          'Re_Count_Bit7' => $countbit7,
          'Re_Sum_Sec_Bit7' => $sumsecbit7,

          'Re_Count_Bit8' => $countbit8,
          'Re_Sum_Sec_Bit8' => $sumsecbit8,

          'Re_Shift' => 0,
          'Re_Location' => $location,
          
          'Re_Hs_S' => $dateS,
          'Re_Hs_E' => $dateE,
          'Re_Cal_By_Hs' =>  $dateGet .' '.  $dateT));
      //forloop    
     };

    }

    /**
     * Display the specified resource.s
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
