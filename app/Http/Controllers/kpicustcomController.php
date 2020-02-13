<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\kpi_custcom;
use DataTables;
use Validator;
use DB;

class kpicustcomController extends Controller
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
            $data = kpi_custcom::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       

        return view('page.kpi_customercomplaints');
       
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

        $rules = array(
            'mcnumber'    =>  'required',
            'custname'     =>  'required',
           // 'Name'    =>  'required',
            'type'    =>  'required',
            'remark'     =>  'required',
            'user'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);
     
        
        if($error->fails())
        {
     
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Cc_Mcnumber'        =>  $request->mcnumber,
            'Cc_Namecust'         =>  $request->custname,
          //  'Cc_Name'      =>  $request->Name,        
            'Cc_Type'      =>  $request->type,
            'Cc_Remark'      =>  $request->remark,
            'Cc_User'      =>  $request->user
        );
      //  dd( $form_data); 
      kpi_custcom::create($form_data);
       return response()->json(['success' => 'Data Added successfully.']);
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
        if(request()->ajax())
        {
            $data = kpi_custcom::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,kpi_custcom $kpi_custcom)
    {
        $rules = array(
            'mcnumber'    =>  'required',
            'custname'     =>  'required',
           // 'Name'    =>  'required',
            'type'    =>  'required',
            'remark'     =>  'required',
            'user'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);
     
        
        if($error->fails())
        {
     
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Cc_Mcnumber'        =>  $request->mcnumber,
            'Cc_Namecust'         =>  $request->custname,
          //  'Cc_Name'      =>  $request->Name,        
            'Cc_Type'      =>  $request->type,
            'Cc_Remark'      =>  $request->remark,
            'Cc_User'      =>  $request->user
        );
        kpi_custcom::whereId($request->hidden_id)->update($form_data);
       return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kpi_custcom::findOrFail($id);
        $data->delete();
    }
}
