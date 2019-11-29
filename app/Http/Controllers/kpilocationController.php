<?php

namespace App\Http\Controllers;

use App\kpi_location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class kpilocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = kpi_location::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('page.kpi_location');
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
        // 'Lo_Name',
        //'Lo_Detail',
        //'Lo_User'
        $rules = array(
            'Lo_Name'    =>   ['required', 'string'],
            'Lo_Detail'     =>  'required',
            'Lo_User'    =>  'required'
          
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Lo_Name'        =>  $request->Lo_Name,
            'Lo_Detail'         =>  $request->Lo_Detail,
            'Lo_User'      =>  $request->Lo_User
           
        );
        kpi_location::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_location  $kpi_location
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_location $kpi_location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_location  $kpi_location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_location::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_location  $kpi_location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_location $kpi_location)
    {
        //
        $rules = array(
           // 'Lo_Name'    =>   ['required', 'string'],
            'Lo_Detail'     =>  'required',
            'Lo_User'    =>  'required'
           );
   
           $error = Validator::make($request->all(), $rules);
   
           if($error->fails())
           {
               return response()->json(['errors' => $error->errors()->all()]);
           }
   
           $form_data = array(
           // 'Lo_Name'        =>  $request->Lo_Name,
            'Lo_Detail'         =>  $request->Lo_Detail,
            'Lo_User'      =>  $request->Lo_User
           );
   
           kpi_location::whereId($request->hidden_id)->update($form_data);
   
           return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_location  $kpi_location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_location::findOrFail($id);
        $data->delete();
    }
}
