<?php

namespace App\Http\Controllers;

use App\kpi_mcs;
use App\kpi_node;
use App\kpi_location;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Route;


class kpimcsController extends Controller
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
            $data = kpi_mcs::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       // $listnode = DB::table('kpi_nodes')->get();
        $listnode = kpi_node::latest()->get();
        $listlocation = kpi_location::latest()->get();
     
        //$arr = kpi_mcs::select('Mc_Node')->distinct()->get()->toArray();
        //$arr =['n01','n02','n03'];
        
       // $listnode = kpi_node::latest()
        //            ->whereNotIn('Nd_Number',$arr)
        //            ->get();
                
        $urlname = Route::currentRouteName();
        return view('page.kpi_mcs')->with('listnode',$listnode)->with('urlname',$urlname)->with('listlocation',$listlocation);
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
        $rules = array(
          //  'Mc_Number'    =>   ['required', 'string', 'unique:kpi_mcs'],
          'Mc_Number'    =>   ['required', 'string'],
          'Mc_Node'    =>   ['required', 'string', 'unique:kpi_mcs'],    
            'Mc_Name'     =>  'required',
            'Mc_Type'    =>  'required',
            'Mc_Brand'    =>  'required',
            'Mc_Location'     =>  'required',
            'Mc_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Mc_Number'        =>  $request->Mc_Number,
            'Mc_Node'        =>  $request->Mc_Node,
            'Mc_Name'         =>  $request->Mc_Name,
            'Mc_Type'      =>  $request->Mc_Type,
            'Mc_Brand'     =>  $request->Mc_Brand,
            'Mc_Location'      =>  $request->Mc_Location,
            'Mc_User'      =>  $request->Mc_User
        );
     
          $count = kpi_mcs::where(['Mc_Number' => $request->Mc_Number ])
                           ->where(['Mc_Node' => $request->Mc_Node ])->count();
       

          if( $count < 1)
          {
            kpi_mcs::create($form_data);
            
            return response()->json(['success' => 'Data Added successfully.'.$count]);

          }
          else{
            return response()->json(['errors2' => 'Data'.$count]);
          }
         
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kpi_mcs  $kpi_mcs
     * @return \Illuminate\Http\Response
     */
    public function show(kpi_mcs $kpi_mcs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kpi_mcs  $kpi_mcs
     * @return \Illuminate\Http\Response
     */
   // public function edit(kpi_mcs $kpi_mcs)
   public function edit($id)
    {
        //
        
        if(request()->ajax())
        {
            $data = kpi_mcs::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kpi_mcs  $kpi_mcs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kpi_mcs $kpi_mcs)
    
    {
        
        $rules = array(
            'Mc_Number'    =>   ['required', 'string'],
            'Mc_Node'    =>   ['required', 'string', 'unique:kpi_mcs'],    
              'Mc_Name'     =>  'required',
              'Mc_Type'    =>  'required',
              'Mc_Brand'    =>  'required',
              'Mc_Location'     =>  'required',
              'Mc_User'     =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'Mc_Number'        =>  $request->Mc_Number,
            'Mc_Node'        =>  $request->Mc_Node,
            'Mc_Name'         =>  $request->Mc_Name,
            'Mc_Type'      =>  $request->Mc_Type,
            'Mc_Brand'     =>  $request->Mc_Brand,
            'Mc_Location'      =>  $request->Mc_Location,
            'Mc_User'      =>  $request->Mc_User
        );

        kpi_mcs::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kpi_mcs  $kpi_mcs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = kpi_mcs::findOrFail($id);
        $data->delete();
    }

   
}
