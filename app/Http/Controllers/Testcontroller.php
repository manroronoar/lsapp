<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class Testcontroller extends Controller
{
   // public function index()
   // {
  //  echo "Heoll world";
   // }

   public function index()
   {
   // $mcs_list = DB::table('kpi_mcs')->get();
    return view('testpage2');

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
