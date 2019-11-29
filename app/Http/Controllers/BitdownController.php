<?php

namespace App\Http\Controllers;

use App\kpi_bittypedown;
//use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class BitdownController extends Controller
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
            $data = kpi_bittypedown::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       return view('page.kpi_bitdowntype');
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
    //'Bi_Bit','Bi_Type', 'Bi_User'
    public function store(Request $request)
    {
        $rules = array(
            'Bi_Bit'    =>   ['required','integer','unique:kpi_bittypedowns'],
            'Bi_Type'     =>  'required',
            'Bi_User'    =>  'required'
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Bi_Bit'        =>  $request->Bi_Bit,
            'Bi_Type'         =>  $request->Bi_Type,
            'Bi_User'      =>  $request->Bi_User
        );

        kpi_bittypedown::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_bittypedown  $kpi_bittypedown
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_bittypedown $kpi_bittypedown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_bittypedown  $kpi_bittypedown
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_bittypedown::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_bittypedown  $kpi_bittypedown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_bittypedown $kpi_bittypedown)
    {
        $rules = array(
            'Bi_Bit'    =>   ['required','integer'],
            'Bi_Type'     =>  'required',
            'Bi_User'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Bi_Bit'        =>  $request->Bi_Bit,
            'Bi_Type'         =>  $request->Bi_Type,
            'Bi_User'      =>  $request->Bi_User
        );

        kpi_bittypedown::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_bittypedown  $kpi_bittypedown
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_bittypedown::findOrFail($id);
        $data->delete();
    }
}
