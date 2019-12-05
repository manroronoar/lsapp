<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\kpi_mcs;
use App\kpi_node;
use App\kpi_location;
use DB;
use DataTables;
use Validator;


class Testcontroller extends Controller
{
  // public function index()
  // {
  //  echo "Heoll world";
  // }

   public function index()
   {
    //$mcs_list = kpi_mcs::get();
    return view('page.Testaddmc');

   }
   public function readdata()
   {
    //$mcs_list = kpi_mcs::get();
    $data = kpi_mcs::latest()->get();
    //return response()->json(['id' => 1, 'name' => 'Gujarat']);
    return response()->json(['result' => $data]);
    //return response::json($data);
   // return view('page.Testaddmc');
    

   }

   public function kpi()
   {
       
    if (Auth::check())

    {
      return view('page.KPI');
    }
    
    else

    {
      return view('auth.login');
    }
  }

  
}
