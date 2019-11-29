<?php

namespace App\Http\Controllers;

use App\kpi_setupcode;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class SetupcodeController extends Controller
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
            $data = kpi_setupcode::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('page.kpi_setupcode');
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
            'Sc_Number'    =>   ['required', 'string', 'unique:kpi_setupcodes'],
            'Sc_Name'     =>  'required',
            'Sc_Remark'    =>  'required',
            'Sc_Status'    =>  'required',
            'Sc_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Sc_Number'        =>  $request->Sc_Number,
            'Sc_Name'         =>  $request->Sc_Name,
            'Sc_Remark'      =>  $request->Sc_Remark,
            'Sc_Status'     =>  $request->Sc_Status,
            'Sc_User'      =>  $request->Sc_User
        );

        kpi_setupcode::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_setupcode  $kpi_setupcode
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_setupcode $kpi_setupcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_setupcode  $kpi_setupcode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_setupcode::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_setupcode  $kpi_setupcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_setupcode $kpi_setupcode)
    {
        $rules = array(
            //'Sc_Number'    =>   ['required', 'string', 'unique:kpi_downcodes'],
            'Sc_Name'     =>  'required',
            'Sc_Remark'    =>  'required',
            'Sc_Status'    =>  'required',
            'Sc_User'     =>  'required'
          );
  
          $error = Validator::make($request->all(), $rules);
  
          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }
  
          $form_data = array(
            //'Sc_Number'        =>  $request->Sc_Number,
            'Sc_Name'         =>  $request->Sc_Name,
            'Sc_Remark'      =>  $request->Sc_Remark,
            'Sc_Status'     =>  $request->Sc_Status,
            'Sc_User'      =>  $request->Sc_User
          );
  
          kpi_setupcode::whereId($request->hidden_id)->update($form_data);
  
          return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_setupcode  $kpi_setupcode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_setupcode::findOrFail($id);
        $data->delete();
    }
}
