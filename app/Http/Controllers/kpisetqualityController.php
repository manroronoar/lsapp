<?php

namespace App\Http\Controllers;

use App\kpi_setquality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class kpisetqualityController extends Controller
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
            $data = kpi_setquality::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('page.kpi_setquality');

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
        //'Sq_Fixqualitie', 
        //'Sq_Location', 
        //'Sq_User'
        $rules = array(
            'Sq_Mc'     =>  ['required','string','unique:kpi_setqualities'],
            'Sq_Fixqualitie'    =>   ['required','numeric'],
            'Sq_User'    =>  'required'
          
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Sq_Mc'        =>  $request->Sq_Mc,
            'Sq_Fixqualitie'        =>  $request->Sq_Fixqualitie,
            'Sq_User'      =>  $request->Sq_User
           
        );
        kpi_setquality::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_setquality  $kpi_setquality
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_setquality $kpi_setquality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_setquality  $kpi_setquality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_setquality::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_setquality  $kpi_setquality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_setquality $kpi_setquality)
    {
        //
        $rules = array(
          //  'Sq_Mc'    =>   'required',
            'Sq_Fixqualitie'    =>   'required',
           // 'Sq_Location'     =>  'required',
            'Sq_User'    =>  'required'
           );
   
           $error = Validator::make($request->all(), $rules);
   
           if($error->fails())
           {
               return response()->json(['errors' => $error->errors()->all()]);
           }
   
           $form_data = array(
           // 'Sq_Mc'        =>  $request->Sq_Mc,
            'Sq_Fixqualitie'        =>  $request->Sq_Fixqualitie,
            //'Sq_Location'         =>  $request->Sq_Location,
            'Sq_User'      =>  $request->Sq_User
           );
   
           kpi_setquality::whereId($request->hidden_id)->update($form_data);
   
           return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_setquality  $kpi_setquality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_setquality::findOrFail($id);
        $data->delete();
    }
}
