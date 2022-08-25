<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Amenity;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;


class AmenityController extends Controller
{
    

        function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function datatable()
        {
        	$datas=Amenity::orderBy('id','DESC')->get();
        	
        	 return DataTables::of($datas)
        	 ->addIndexColumn()
    	  	  ->editColumn('status',function(Amenity $data){
    	  	  	$check="checked";
          			return '<label>
          			<input type="checkbox" name="status" value="0" "'.(($data->status==0) ? "checked" : '' ).'" ><span class="cr"></span></label>';
    	  	   })
        	 ->editColumn('action',function(Amenity $data){
        	          return '<a href="'.route('amenity.edit',$data->id).'" class="btn btn-success btn-sm">
        	           <i class="icofont icofont-ui-edit"></i>
        	           </a>
        	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('amenity.delete').'"  item_id="'.$data->id.'">
        	            <i class="icofont icofont-delete-alt"></i>
        	           </a>';
        	 })
        	->rawColumns(['status','action'])
        	 ->make(true);
        }


        public  function index()
        {
        	return view('admin.amenity.index');
        }


        public function create()
        {
        	return view('admin.amenity.create');
        }


        public function store(Request $request)
        {

        	$this->validate($request, [
        	     'name' => 'required|unique:amenities',
        	 ]);

        	if ($request->isMethod('post'))
        	  {
        	      DB::beginTransaction();

        	      try{

        	          //create amenity

        	          $amenity = new Amenity();
        	          $amenity->name = $request->name;
        	          $amenity->save();

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
        	$data=Amenity::findOrFail($id);
        	return view('admin.amenity.edit',compact('data'));
        }


        public function update(Request $request)
        {
        	$amenity=Amenity::findOrFail($request->id);
        	$this->validate($request, [
        	     'name' => 'required|unique:amenities,name,'.$amenity->id,
        	      
        	 ]);

        	if ($request->isMethod('post'))
        	  {
        	      DB::beginTransaction();

        	      try{

        	          //updare amenity
        	          $amenity->name = $request->name;
        	          $amenity->save();

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

         $data=Amenity::findOrFail($request->item_id);
         $data->delete();
         $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

         return \response()->json([
             'message' => 'Successfully deleted',
             'status_code' => 200
         ], Response::HTTP_OK);

        }
}
