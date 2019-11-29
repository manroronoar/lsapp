<?php

namespace App\Http\Controllers;

use App\kpi_shift;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class ShiftController extends Controller
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
            $data = kpi_shift::latest()->get();
            return DataTables::of($data)
                    ->editColumn('Sh_Status', function(kpi_shift $kpi_shift) {
             
                     $selecename = DB::table('kpi_checktypes')->where('CH_Type', $kpi_shift->Sh_Status)->value('CH_Name');
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
        $liststatus = DB::table('kpi_checktypes')->get();
        return view('page.kpi_shift')->with('liststatus',$liststatus);
    
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
            'Sh_Name'    =>   ['required', 'string'],
            'Sh_Type'     =>  'required',
            'Sh_Timestart'    =>  'required',
            'Sh_Timestop'    =>  'required',
            'Sh_Status'     =>  'required',
            'Sh_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Sh_Name'        =>  $request->Sh_Name,
            'Sh_Type'         =>  $request->Sh_Type,
            'Sh_Timestart'      =>  $request->Sh_Timestart,
            'Sh_Timestop'     =>  $request->Sh_Timestop,
            'Sh_Status'      =>  $request->Sh_Status,
            'Sh_User'      =>  $request->Sh_User
        );
        kpi_shift::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_shift  $kpi_shift
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_shift $kpi_shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_shift  $kpi_shift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = kpi_shift::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_shift  $kpi_shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_shift $kpi_shift)
    {
        $rules = array(
         //   'Sh_Name'    =>   ['required', 'string',],
            'Sh_Type'     =>  'required',
            'Sh_Timestart'    =>  'required',
            'Sh_Timestop'    =>  'required',
            'Sh_Status'     =>  'required',
            'Sh_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
          //  'Sh_Name'        =>  $request->Sh_Name,
            'Sh_Type'         =>  $request->Sh_Type,
            'Sh_Timestart'      =>  $request->Sh_Timestart,
            'Sh_Timestop'     =>  $request->Sh_Timestop,
            'Sh_Status'      =>  $request->Sh_Status,
            'Sh_User'      =>  $request->Sh_User
        );

        kpi_shift::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_shift  $kpi_shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_shift::findOrFail($id);
        $data->delete();
    }
}
