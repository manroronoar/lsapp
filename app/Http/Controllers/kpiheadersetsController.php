<?php

namespace App\Http\Controllers;

use App\kpi_headerset;
use App\kpi_mcs;
use App\kpi_shift;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;


class kpiheadersetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = kpi_headerset::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $listmcnumber = DB::table('kpi_mcs')->distinct()->get(['Mc_Number']);
        $listshift = DB::table('kpi_shifts')->get();
       // $listmcnumber = ['aaa','bbb','ccc'];
        return view('page.kpi_headerSettings')->with('listmcnumber',$listmcnumber)->with('listshift',$listshift);
       // return view('page.kpi_headerSettings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                    //
    //  $listmcnumber = DB::table('kpi_mcs')->get();
     // return view('/testdropdows')->with('listmcnumber',$listmcnumber);

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
        $rules = array(
            //'Hs_Mc'    =>  [ 'nullable','string' ],
            'Hs_Mc'    =>   ['required', 'string', 'unique:kpi_headersets'],   
            'Hs_TargetHour'     =>   ['required','numeric'],
            'Hs_Drawing'    =>  'required',
            'Hs_Shift'    =>  'required',
            'Hs_Employee'     =>  'required',
            'Hs_Customer'     =>  'required'
        );
      
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
              return response()->json(['errors' => $error->errors()->all()]);
           // return response()->json($validator->messages(), 200);
          //  return view('page.kpi_headerSettings')->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Hs_Mc'        =>  $request->Hs_Mc,
            'Hs_TargetHour'         =>  $request->Hs_TargetHour,
            'Hs_Drawing'      =>  $request->Hs_Drawing,
            'Hs_Shift'     =>  $request->Hs_Shift,
            'Hs_Employee'      =>  $request->Hs_Employee,
            'Hs_Customer'      =>  $request->Hs_Customer
        );

        kpi_headerset::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);   
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_headerset  $kpi_headerset
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_headerset $kpi_headerset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_headerset  $kpi_headerset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_headerset::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_headerset  $kpi_headerset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_headerset $kpi_headerset)   
    {
       
            $rules = array(
                //'Hs_Mc'    =>  [ 'nullable','string' ],
               // 'Hs_Mc'    =>   'required',
                'Hs_TargetHour'     =>   ['required','numeric'],
                'Hs_Drawing'    =>  'required',
                'Hs_Shift'    =>  'required',
                'Hs_Employee'     =>  'required',
                'Hs_Customer'     =>  'required'
          );
  
          $error = Validator::make($request->all(), $rules);
  
          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }
  
          $form_data = array(
           // 'Hs_Mc'        =>  $request->Hs_Mc,
            'Hs_TargetHour'         =>  $request->Hs_TargetHour,
            'Hs_Drawing'      =>  $request->Hs_Drawing,
            'Hs_Shift'     =>  $request->Hs_Shift,
            'Hs_Employee'      =>  $request->Hs_Employee,
            'Hs_Customer'      =>  $request->Hs_Customer
          );
  
          kpi_headerset::whereId($request->hidden_id)->update($form_data);
  
          return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_headersets  $kpi_headersets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = kpi_headerset::findOrFail($id);
        $data->delete();
    }

    

}
