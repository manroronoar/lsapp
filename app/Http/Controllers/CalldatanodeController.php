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
       // dd($dateT);
       
      if ($dateT <= '00:00:00' && $dateT <= '01:59:59')
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



        $countmc = kpi_mcs::select('Mc_Number')->distinct()->get();


       $msmcnode = DB::table('kpi_mcs')
       ->join('kpi_nodes', 'kpi_mcs.Mc_node', '=', 'kpi_nodes.Nd_Number')
       ->select('kpi_nodes.Nd_Number', 'kpi_mcs.Mc_Number')
       ->where('kpi_mcs.Mc_Number', '=', 'mc001');
      // ->get();

      //testdata
        $dateS = '00:00:00';
        $dateE = '23:59:59';

       $test = DB::table('kpi_getnodejsons')
        ->joinSub($msmcnode, 'msmcnode', function ($join) use ($dateD,$dateS,$dateE) {
            //$dateD = '2020-01-28';
            $join->on('kpi_getnodejsons.Gn_Node', '=', 'msmcnode.Nd_Number');
            $join->where('kpi_getnodejsons.Gn_dmystr', '=',$dateD);
            $join->whereBetween('kpi_getnodejsons.Gn_hmstr',[$dateS,$dateE]); })
       ->select('msmcnode.Nd_Number', 'msmcnode.Mc_Number','kpi_getnodejsons.Gn_hmstr')
       ->get();
       
     

          dd($dateS,$dateE,$test);
        //  dd($dateGet);
        
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
