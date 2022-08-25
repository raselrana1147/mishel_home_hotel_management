<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\RoomType;
use App\Models\Admin\Amenity;
use App\Models\Admin\AmenityRoomType;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;

class RoomTypeController extends Controller
{
   
        function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function datatable()
        {
        	$datas=RoomType::orderBy('id','DESC')->get();
        	
        	 return DataTables::of($datas)
        	 ->addIndexColumn()
    	  	  ->editColumn('status',function(RoomType $data){
    	  	  	$check="checked";
          			return '<label>
          			<input type="checkbox" name="status" value="0" "'.(($data->status==0) ? "checked" : '' ).'" ><span class="cr"></span></label>';
    	  	   })
  	  	  	  ->editColumn('amenity',function(RoomType $data){
  	  	  	  		$setAmenity='';
  	  	  	  		foreach ($data->amenities as $amenity)
  	  	  	  		{
  	  	  	  			$setAmenity.='<span class="badge badge-danger p-2 mr-1">'.$amenity->name.'</span>';
  	  	  	  		}
  	  	  	  		return $setAmenity;
  	        	 	
  	  	  	   })
        	 ->editColumn('action',function(RoomType $data){
        	          return '<a href="'.route('room_type.edit',$data->id).'" class="btn btn-success btn-sm">
        	           <i class="icofont icofont-ui-edit"></i>
        	           </a>
        	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('room_type.delete').'"  item_id="'.$data->id.'">
        	            <i class="icofont icofont-delete-alt"></i>
        	           </a>';
        	 })
        	->rawColumns(['status','amenity','action'])
        	 ->make(true);
        }


        public  function index()
        {
        	return view('admin.room_type.index');
        }


        public function create()
        {
        	$amenities=DB::table('amenities')->orderBy('id','desc')->get();
        	return view('admin.room_type.create',compact('amenities'));
        }


        public function store(Request $request)
        {

        	$this->validate($request, [
        	     'name' => 'required|unique:room_types',
        	     'price' => 'required',
        	     'description' => 'required',
        	     'amenities' => 'required',

        	 ]);

        	if ($request->isMethod('post'))
        	  {
        	      DB::beginTransaction();

        	      try{

        	          //create Room type

        	          $room_type = new RoomType();
        	          $room_type->name = $request->name;
        	          $room_type->price = $request->price;
        	          $room_type->description = $request->description;
        	          $room_type->save();

        	          foreach ($request->amenities as  $amenity) {
        	          	$amenityRoomType=new AmenityRoomType();
        	          	$amenityRoomType->amenity_id=$amenity;
        	          	$amenityRoomType->room_type_id=$room_type->id;
        	          	$amenityRoomType->save();
        	          }

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
        	$data=RoomType::findOrFail($id);
        	$amenities=DB::table('amenities')->orderBy('id','desc')->get();
        	return view('admin.room_type.edit',compact('data','amenities'));
        }


        public function update(Request $request)
        {
        	$room_type=RoomType::findOrFail($request->id);
        	$this->validate($request, [
        	     'name' => 'required|unique:room_types,name,'.$room_type->id,
        	     'price' => 'required',
        	     'description' => 'required',

        	 ]);

        	if ($request->isMethod('post'))
        	  {
        	      DB::beginTransaction();

        	      try{

        	          //update Room type

        	          
        	          $room_type->name = $request->name;
        	          $room_type->price = $request->price;
        	          $room_type->description = $request->description;
        	          $room_type->save();

        	          if (!is_null($request->amenities))  
        	          {
        	          	$datas=AmenityRoomType::where(['room_type_id'=>$request->id])->get();
        	          	if (!is_null($datas)) {
        	          		foreach ($datas as $data) {
        	          			$data->delete();
        	          			
        	          		}
        	          	}

        	          	foreach ($request->amenities as  $amenity) 
        	          	{
        	          		
        	          		$amenityRoomType=new AmenityRoomType();
        	          		$amenityRoomType->amenity_id=$amenity;
        	          		$amenityRoomType->room_type_id=$room_type->id;
        	          		$amenityRoomType->save();
        	          	}
        	          }


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



        public function delete(Request $request){

         $data=RoomType::findOrFail($request->item_id);
         $data->delete();
         $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];
         return \response()->json([
             'message' => 'Successfully deleted',
             'status_code' => 200
         ], Response::HTTP_OK);

        }
}
