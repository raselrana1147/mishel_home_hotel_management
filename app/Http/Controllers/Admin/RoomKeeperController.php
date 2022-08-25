<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\RoomKeeper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class RoomKeeperController extends Controller
{
    
       function __construct()
       {
           $this->middleware('auth:admin');
       }

       public function datatable()
       {
       	$datas=RoomKeeper::orderBy('id','DESC')->get();
       	
       	 return DataTables::of($datas)
       	 ->addIndexColumn()
       	  ->editColumn('avatar',function(RoomKeeper $data){
   	           $url=$data->avatar ? asset("assets/backend/image/room_keeper/small/".$data->avatar) 
   	           : default_image();
   	           return '<img src='.$url.' border="0" width="80" height="80" class="img-rounded" style="border-radius:50%"/>';         
       	   })
   	  	  ->editColumn('status',function(RoomKeeper $data){
         			return $data->status==0 ? '<label class="text-success">Availabe</label>' : '<label class="text-danger">Unavailabe</label>';
   	  	   })
       	 ->editColumn('action',function(RoomKeeper $data){
       	          return '<a href="'.route('room_keeper.edit',$data->id).'" class="btn btn-success btn-sm">
       	           <i class="icofont icofont-ui-edit"></i>
       	           </a>
       	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('room_keeper.delete').'"  item_id="'.$data->id.'">
       	            <i class="icofont icofont-delete-alt"></i>
       	           </a>';
       	 })
       	->rawColumns(['avatar','status','action'])
       	 ->make(true);
       }


       public  function index()
       {
       	return view('admin.room_keeper.index');
       }


       public function create()
       {
       	return view('admin.room_keeper.create');
       }


       public function store(Request $request)
       {

       	$this->validate($request, [
       	     'name' => 'required',
       	     'phone' => 'required|unique:room_keepers',
       	     'charge' => 'numeric',
       	 ]);

       	if ($request->isMethod('post'))
       	  {
       	      DB::beginTransaction();

       	      try{

       	          //create Room Keeper

       	          $room_keeper = new RoomKeeper();

       	          $room_keeper->name = $request->name;
       	          $room_keeper->phone = $request->phone;
       	          $room_keeper->charge = $request->charge;

       	          if($request->hasFile('avatar')){

   	                  $image=$request->avatar;
   	            
   	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
   	                  $original_image_path = base_path().'/assets/backend/image/room_keeper/original/'.$image_name;
   	                  $large_image_path = base_path().'/assets/backend/image/room_keeper/large/'.$image_name;
   	                  $medium_image_path = base_path().'/assets/backend/image/room_keeper/medium/'.$image_name;
   	                  $small_image_path = base_path().'/assets/backend/image/room_keeper/small/'.$image_name;

   	                  //Resize Image
   	                  Image::make($image)->save($original_image_path);
   	                  Image::make($image)->resize(800,680)->save($large_image_path);
   	                  Image::make($image)->resize(500,450)->save($medium_image_path);
   	                  Image::make($image)->resize(350,250)->save($small_image_path);
   	                  $room_keeper->avatar = $image_name;
       	              
       	          }

       	          $room_keeper->save();

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
           $data=RoomKeeper::findOrFail($id);
           return view('admin.room_keeper.edit',compact('data'));
       }

       public function update(Request $request)
       {

          $room_keeper=RoomKeeper::findOrFail($request->id);
            $this->validate($request, [
                 'name' => 'required',
                 'phone' => 'required|unique:room_keepers,phone,'.$room_keeper->id,
                 'charge' => 'numeric',
             ]);

          if ($request->isMethod('post'))
            {
                DB::beginTransaction();

                try{

                    //update Slider
                   
                    $room_keeper->name = $request->name;
                    $room_keeper->phone = $request->phone;
                    $room_keeper->charge = $request->charge;
                    if($request->hasFile('avatar')){

                            // delete current image

                          if (File::exists(base_path('/assets/backend/image/room_keeper/small/'.$room_keeper->avatar))) 
                            {
                              File::delete(base_path('/assets/backend/image/room_keeper/small/'.$room_keeper->avatar));
                            }
                            if (File::exists(base_path('/assets/backend/image/room_keeper/medium/'.$room_keeper->avatar))) 
                            {
                              File::delete(base_path('/assets/backend/image/room_keeper/medium/'.$room_keeper->avatar));
                            }

                            if (File::exists(base_path('/assets/backend/image/room_keeper/large/'.$room_keeper->avatar)))
                             {
                               File::delete(base_path('/assets/backend/image/room_keeper/large/'.$room_keeper->image));
                             }

                             if (File::exists(base_path('/assets/backend/image/room_keeper/original/'.$room_keeper->avatar)))
                             {
                                File::delete(base_path('/assets/backend/image/room_keeper/original/'.$room_keeper->avatar));
                             }
                            // upload new image
                            $image=$request->avatar;
                            $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                            $original_image_path = base_path().'/assets/backend/image/room_keeper/original/'.$image_name;
                            $large_image_path = base_path().'/assets/backend/image/room_keeper/large/'.$image_name;
                            $medium_image_path = base_path().'/assets/backend/image/room_keeper/medium/'.$image_name;
                            $small_image_path = base_path().'/assets/backend/image/room_keeper/small/'.$image_name;

                           //Resize Image
                           Image::make($image)->save($original_image_path);
                           Image::make($image)->resize(800,680)->save($large_image_path);
                           Image::make($image)->resize(500,450)->save($medium_image_path);
                           Image::make($image)->resize(350,250)->save($small_image_path);
                           $room_keeper->avatar = $image_name;
                        
                    }

                    $room_keeper->save();

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

        $data=RoomKeeper::findOrFail($request->item_id);

        if (File::exists(base_path('/assets/backend/image/room_keeper/small/'.$data->avatar))) 
          {
            File::delete(base_path('/assets/backend/image/room_keeper/small/'.$data->avatar));
          }
          if (File::exists(base_path('/assets/backend/image/room_keeper/medium/'.$data->avatar))) 
          {
            File::delete(base_path('/assets/backend/image/room_keeper/medium/'.$data->avatar));
          }

          if (File::exists(base_path('/assets/backend/image/room_keeper/large/'.$data->avatar)))
           {
             File::delete(base_path('/assets/backend/image/room_keeper/large/'.$data->avatar));
           }

           if (File::exists(base_path('/assets/backend/image/room_keeper/original/'.$data->avatar)))
           {
              File::delete(base_path('/assets/backend/image/room_keeper/original/'.$data->avatar));
           }
        $data->delete();
        $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

        return \response()->json([
            'message' => 'Successfully deleted',
            'status_code' => 200
        ], Response::HTTP_OK);

       }
}
