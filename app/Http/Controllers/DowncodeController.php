<?php

namespace App\Http\Controllers;

use App\kpi_downcode;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Validator;

class DowncodeController extends Controller
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
            $data = kpi_downcode::latest()->get();
                    return DataTables::of($data)
                    ->editColumn('Dc_Status', function(kpi_downcode $kpi_downcode) {
                    $selecename = DB::table('kpi_checktypes')->where('CH_Type', $kpi_downcode->Dc_Status)->value('CH_Name');
                    return  $selecename;
                    })
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $listdowntype = DB::table('kpi_bittypedowns')->get();
        $liststatus = DB::table('kpi_checktypes')->get();
        return view('page.kpi_downcode')->with('listdowntype',$listdowntype)->with('liststatus',$liststatus);
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
        //'Dc_Number','Dc_Type','Dc_Name','Dc_Remark', 'Dc_Status','Dc_User'
        $rules = array(
           // 'Dc_Number'    =>   ['required', 'string', 'unique:kpi_downcodes'],
            'Dc_Number'    => ['required', 'string', 'unique:kpi_downcodes'],
            'Dc_Type'     =>  'required',
            'Dc_Name'    =>  'required',
            'Dc_Remark'    =>  'required',
            'Dc_Status'     =>  'required',
            'Dc_User'        =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Dc_Number'        =>  $request->Dc_Number,
            'Dc_Type'         =>  $request->Dc_Type,
            'Dc_Name'      =>  $request->Dc_Name,
            'Dc_Remark'      =>  $request->Dc_Remark,
            'Dc_Status'     =>  $request->Dc_Status,
            'Dc_User'      =>  $request->Dc_User
        );

        kpi_downcode::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_downcode  $kpi_downcode
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_downcode $kpi_downcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_downcode  $kpi_downcode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_downcode::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_downcode  $kpi_downcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_downcode $kpi_downcode)
    {
        $rules = array(
           // 'Dc_Number'    => ['required', 'string', 'unique:kpi_downcodes'],
            'Dc_Type'     =>  'required',
            'Dc_Name'    =>  'required',
            'Dc_Remark'    =>  'required',
            'Dc_Status'     =>  'required',
            'Dc_User'        =>  'required'
          );
  
          $error = Validator::make($request->all(), $rules);
  
          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }
  
          $form_data = array(
            'Dc_Number'        =>  $request->Dc_Number,
            'Dc_Type'         =>  $request->Dc_Type,
            'Dc_Name'      =>  $request->Dc_Name,
            'Dc_Remark'      =>  $request->Dc_Remark,
            'Dc_Status'     =>  $request->Dc_Status,
            'Dc_User'      =>  $request->Dc_User
          );
  
          kpi_downcode::whereId($request->hidden_id)->update($form_data);
  
          return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_downcode  $kpi_downcode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_downcode::findOrFail($id);
        $data->delete();
    }
}
