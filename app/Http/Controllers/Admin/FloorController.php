<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Floor;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class FloorController extends Controller
{
   function __construct()
   {
       $this->middleware('auth:admin');
   }

   public function datatable()
   {
   	$datas=Floor::orderBy('id','DESC')->get();
   	
   	 return DataTables::of($datas)
   	 ->addIndexColumn()
	  	  ->editColumn('status',function(Floor $data){
	  	  	$check="checked";
     			return '<label>
     			<input type="checkbox" name="status" value="0" "'.(($data->status==0) ? "checked" : '' ).'" ><span class="cr"></span></label>';
	  	   })
   	 ->editColumn('action',function(Floor $data){
   	          return '<a href="'.route('floor.edit',$data->id).'" class="btn btn-success btn-sm">
   	           <i class="icofont icofont-ui-edit"></i>
   	           </a>
   	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('floor.delete').'"  item_id="'.$data->id.'">
   	            <i class="icofont icofont-delete-alt"></i>
   	           </a>';
   	 })
   	->rawColumns(['status','action'])
   	 ->make(true);
   }


   public  function index()
   {
   	return view('admin.floor.index');
   }


   public function create()
   {
   	return view('admin.floor.create');
   }


   public function store(Request $request)
   {

   	$this->validate($request, [
   	     'floor_name' => 'required|unique:floors',
   	 ]);

   	if ($request->isMethod('post'))
   	  {
   	      DB::beginTransaction();

   	      try{

   	          //create floor

   	          $floor = new Floor();
   	          $floor->floor_name = $request->floor_name;
   	          $floor->save();

   	          DB::commit();
   	          return \response()->json([
   	              'message' => "Data added successfully",
   	              'status_code' => 200
   	          ], Response::HTTP_OK);
   	      }catch (QueryException $e){
   	          DB::rollBack();
   	          $error = $e->getMessage();
   	          return \response()->json([
   	              'error' => $error,
   	              'status_code' => 500
   	          ], Response::HTTP_INTERNAL_SERVER_ERROR);
   	      }
   	  }
   }


   public function edit($id){
   	$data=Floor::findOrFail($id);
   	return view('admin.floor.edit',compact('data'));
   }


   public function update(Request $request)
   {
   	$floor=Floor::findOrFail($request->id);
   	$this->validate($request, [
   	     'floor_name' => 'required|unique:floors,floor_name,'.$floor->id,
   	      
   	 ]);

   	if ($request->isMethod('post'))
   	  {
   	      DB::beginTransaction();

   	      try{

   	          //updare floor
   	          $floor->floor_name = $request->floor_name;
   	          $floor->save();

   	          DB::commit();
   	          return \response()->json([
   	              'message' => "Data updated successfully",
   	              'status_code' => 200
   	          ], Response::HTTP_OK);
   	      }catch (QueryException $e){
   	          DB::rollBack();
   	          $error = $e->getMessage();
   	          return \response()->json([
   	              'error' => $error,
   	              'status_code' => 500
   	          ], Response::HTTP_INTERNAL_SERVER_ERROR);
   	      }
   	  }
   }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
   public function delete(Request $request){

    $data=Floor::findOrFail($request->item_id);
    $data->delete();
    $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

    return \response()->json([
        'message' => 'Successfully deleted',
        'status_code' => 200
    ], Response::HTTP_OK);

   }
}
