<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Room;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class RoomController extends Controller
{
    

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Room::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	  ->editColumn('image',function(Room $data){
	           $url=$data->image ? asset("assets/backend/image/room/small/".$data->image) 
	           :default_image();
	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
    	   })
	  	  ->editColumn('status',function(Room $data){
      			return $data->status==0 ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>';
	  	   })
    	 ->editColumn('action',function(Room $data){
    	          return '
    	          <a href="'.route('room.detail',$data->id).'" class="btn btn-info btn-sm">
    	           <i class="icofont icofont-eye"></i>
    	           </a>
    	          <a href="'.route('room.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('room.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['image','status','action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.room.index');
    }


    public function create()
    {
    	$room_types=DB::table('room_types')->orderBy('id','desc')->get();
    	$floors=DB::table('floors')->orderBy('id','desc')->get();
    	$room_keepers=DB::table('room_keepers')->orderBy('id','desc')->get();
        return view('admin.room.create',compact('room_types','floors','room_keepers'));
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'title' => 'required',
    	     'room_type_id' => 'required',
    	     'floor_id' => 'required',
    	     'room_keeper_id' => 'nullable',
    	     'room_number' => 'required|unique:rooms',
    	     'max_capacity' => 'required|numeric',
    	     'num_of_bed' => 'required|numeric',
    	     'description' => 'required',
    	     'image' => 'required|image|mimes:jpeg,png,jpg',

    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{

    	          //create room

    	          $room = new Room();

    	          $room->title          = $request->title;
    	          $room->room_type_id   = $request->room_type_id;
    	          $room->floor_id       = $request->floor_id;
    	          $room->room_keeper_id = $request->room_keeper_id;
    	          $room->room_number    = $request->room_number;
    	          $room->max_capacity   = $request->max_capacity;
    	          $room->num_of_bed     = $request->num_of_bed;
    	          $room->description    = $request->description;

    	          if($request->hasFile('image')){

    	                  $image=$request->image;
    	            
    	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
    	                  $original_image_path = base_path().'/assets/backend/image/room/original/'.$image_name;
    	                  $large_image_path = base_path().'/assets/backend/image/room/large/'.$image_name;
    	                  $medium_image_path = base_path().'/assets/backend/image/room/medium/'.$image_name;
    	                  $small_image_path = base_path().'/assets/backend/image/room/small/'.$image_name;

    	                  //Resize Image
    	                  Image::make($image)->save($original_image_path);
    	                  Image::make($image)->resize(1050,850)->save($large_image_path);
    	                  Image::make($image)->resize(495,380)->save($medium_image_path);
    	                  Image::make($image)->resize(380,400)->save($small_image_path);
    	                  $room->image = $image_name;
    	              
    	          }

    	          $room->save();
                  $data=Room::findOrFail($room->id);
                  $data->slug = Str::slug($request->title,'-').'-'.strtolower(Str::random(3).$data->id.Str::random(3));
                  $data->save();

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


    public function edit($id)
    {

        $data        =Room::findOrFail($id);
        $room_types  =DB::table('room_types')->orderBy('id','desc')->get();
        $floors      =DB::table('floors')->orderBy('id','desc')->get();
        $room_keepers=DB::table('room_keepers')->orderBy('id','desc')->get();

        return view('admin.room.edit',compact('data','room_types','floors','room_keepers'));
    }


    public function update(Request $request)
    {

        $room=Room::findOrFail($request->id);
         $this->validate($request, [
              'title' => 'required',
              'room_type_id' => 'required',
              'floor_id' => 'required',
              'room_keeper_id' => 'nullable',
              'room_number' => 'required|unique:rooms,room_number,'.$room->id,
              'max_capacity' => 'required|numeric',
              'num_of_bed' => 'required|numeric',
              'description' => 'required',
              'image' => 'image|mimes:jpeg,png,jpg',

          ]);
       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update room
                 $room->title          = $request->title;
                 $room->room_type_id   = $request->room_type_id;
                 $room->floor_id       = $request->floor_id;
                 $room->room_keeper_id = $request->room_keeper_id;
                 $room->room_number    = $request->room_number;
                 $room->max_capacity   = $request->max_capacity;
                 $room->num_of_bed     = $request->num_of_bed;
                 $room->description    = $request->description;
                 if($request->hasFile('image')){

                         // delete current image

                       if (File::exists(base_path('/assets/backend/image/room/small/'.$room->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/room/small/'.$room->image));
                         }
                         if (File::exists(base_path('/assets/backend/image/room/medium/'.$room->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/room/medium/'.$room->image));
                         }

                         if (File::exists(base_path('/assets/backend/image/room/large/'.$room->image)))
                          {
                            File::delete(base_path('/assets/backend/image/room/large/'.$room->image));
                          }

                          if (File::exists(base_path('/assets/backend/image/room/original/'.$room->image)))
                          {
                             File::delete(base_path('/assets/backend/image/room/original/'.$room->image));
                          }
                         // upload new image
                         $image=$request->image;
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $original_image_path = base_path().'/assets/backend/image/room/original/'.$image_name;
                         $large_image_path = base_path().'/assets/backend/image/room/large/'.$image_name;
                         $medium_image_path = base_path().'/assets/backend/image/room/medium/'.$image_name;
                         $small_image_path = base_path().'/assets/backend/image/room/small/'.$image_name;

                         //Resize Image
                        Image::make($image)->save($original_image_path);
                        Image::make($image)->resize(1050,850)->save($large_image_path);
                        Image::make($image)->resize(495,380)->save($medium_image_path);
                        Image::make($image)->resize(380,400)->save($small_image_path);
                        $room->image = $image_name;
                     
                 }

                 $room->save();

                 DB::commit();

                 return \response()->json([
                     'message' => 'Data updated successfully',
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

     $data=Room::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/room/small/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/room/small/'.$data->image));
       }
       if (File::exists(base_path('/assets/backend/image/room/medium/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/room/medium/'.$data->image));
       }

       if (File::exists(base_path('/assets/backend/image/room/large/'.$data->image)))
        {
          File::delete(base_path('/assets/backend/image/room/large/'.$data->image));
        }

        if (File::exists(base_path('/assets/backend/image/room/original/'.$data->image)))
        {
           File::delete(base_path('/assets/backend/image/room/original/'.$data->image));
        }
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
