<?php

namespace App\Http\Controllers;

use App\kpi_node;
use App\kpi_checktype;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class NodeController extends Controller
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
            $data = kpi_node::latest()->get();
            return DataTables::of($data)

                   ->editColumn('Nd_Status', function(kpi_node $kpi_node) {
             
                    $selecename = DB::table('kpi_checktypes')->where('CH_Type', $kpi_node->Nd_Status)->value('CH_Name');
                    return  $selecename;
                })
                      //if ($kpi_node->Nd_Status  == 1 )
                       //{
                        //$label = '<label class="control-label col-md-4">ENABLE</label>';
                        //return $label;
                        //return 'ENABER'.$CH_Name;
                        //return  $selecename;
                      
                       //}
                      // else if ($kpi_node->Nd_Status  == 0 )
                      // {
                       // $label = '<label class="control-label col-md-4">DISABLED</label>';
                       // return $label;
                      // return 'dis';
                      // }    
                      //})

                    ->rawColumns(['Nd_Status'])
                   
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $liststatus = DB::table('kpi_checktypes')->get();
              
        return view('page.kpi_node')->with('liststatus',$liststatus);
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
    //`Nd_Number`, 
    //`Nd_Name`, 
    //`Nd_Detail`, 
    //`Nd_Status`, 
    //`Nd_User`,
    public function store(Request $request)
    {
        $rules = array(
            'Nd_Number'    =>   ['required', 'string', 'unique:kpi_nodes'],
            'Nd_Name'     =>  'required',
            'Nd_Detail'    =>  'required',
            'Nd_Status'    =>  'required',
            'Nd_User'     =>  'required'
          
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Nd_Number'        =>  $request->Nd_Number,
            'Nd_Name'         =>  $request->Nd_Name,
            'Nd_Detail'      =>  $request->Nd_Detail,        
            'Nd_Status'      =>  $request->Nd_Status,
            'Nd_User'      =>  $request->Nd_User
        );

        kpi_node::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_node  $kpi_node
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_node $kpi_node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_node  $kpi_node
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = kpi_node::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_node  $kpi_node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_node $kpi_node)
    {
        //
        $rules = array(
            //'Nd_Number'    =>   ['required', 'string', 'unique:kpi_nodes'],
            'Nd_Name'     =>  'required',
            'Nd_Detail'    =>  'required',
            'Nd_Status'    =>  'required',
            'Nd_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
          //  'Nd_Number'        =>  $request->Nd_Number,
            'Nd_Name'         =>  $request->Nd_Name,
            'Nd_Detail'      =>  $request->Nd_Detail,        
            'Nd_Status'      =>  $request->Nd_Status,
            'Nd_User'      =>  $request->Nd_User
        );

        kpi_node::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_node  $kpi_node
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_node::findOrFail($id);
        $data->delete();
    }
}
