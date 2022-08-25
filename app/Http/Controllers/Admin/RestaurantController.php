<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Restaurant;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Image;


class RestaurantController extends Controller
{
 function __construct()
 {
     $this->middleware('auth:admin');
 }

 public function datatable()
 {
 	$datas=Restaurant::orderBy('id','DESC')->get();
 	
 	 return DataTables::of($datas)
 	 ->addIndexColumn()
	  ->editColumn('image',function(Restaurant $data){
           $url=$data->image ? asset("assets/backend/image/restaurant/small/".$data->image) 
           :default_image();
           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
	   })
  	  ->editColumn('status',function(Restaurant $data){
  	  	$check="checked";
			return '<label>
			<input type="checkbox" name="status" value="0" "'.(($data->status==0) ? "checked" : '' ).'" ><span class="cr"></span></label>';
  	   })
  	  	 
 	 ->editColumn('action',function(Restaurant $data){
 	          return '<a href="'.route('restaurant.edit',$data->id).'" class="btn btn-success btn-sm">
 	           <i class="icofont icofont-ui-edit"></i>
 	           </a>
 	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('restaurant.delete').'"  item_id="'.$data->id.'">
 	            <i class="icofont icofont-delete-alt"></i>
 	           </a>';
 	 })
 	->rawColumns(['image','status','action'])
 	 ->make(true);
 }


 public  function index()
 {
 	return view('admin.restaurant.index');
 }


 public function create()
 {
 	return view('admin.restaurant.create');
 }


 public function store(Request $request)
 {

 	$this->validate($request, [
 	     'title' => 'required',
 	     'icon' => 'nullable',
 	     'description' => 'required',
 	     'image' => 'required|mimes:jpeg,png,jpg',

 	 ]);

 	if ($request->isMethod('post'))
 	  {
 	      DB::beginTransaction();

 	      try{

 	          //create restaurant

 	          $restaurant = new Restaurant();
 	          $restaurant->title = $request->title;
 	          $restaurant->icon = $request->icon;
 	          $restaurant->description = $request->description;
 	         

 	         if($request->hasFile('image')){

 	                 $image=$request->image;
 	           
 	                 $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
 	                 $original_image_path = base_path().'/assets/backend/image/restaurant/original/'.$image_name;
 	                 $large_image_path = base_path().'/assets/backend/image/restaurant/large/'.$image_name;
 	                 $medium_image_path = base_path().'/assets/backend/image/restaurant/medium/'.$image_name;
 	                 $small_image_path = base_path().'/assets/backend/image/restaurant/small/'.$image_name;

 	                 //Resize Image
 	                 Image::make($image)->save($original_image_path);
 	                 Image::make($image)->resize(1050,850)->save($large_image_path);
 	                 Image::make($image)->resize(600,450)->save($medium_image_path);
 	                 Image::make($image)->resize(480,490)->save($small_image_path);
 	                 $restaurant->image = $image_name;
 	             
 	         }

 	         $restaurant->save();

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
 	$data=Restaurant::findOrFail($id);
 	return view('admin.restaurant.edit',compact('data'));
 }


 public function update(Request $request)
 {
 	
 	$this->validate($request, [
       'title' => 'required',
       'icon' => 'nullable',
       'description' => 'required',
       'image' => 'required|mimes:jpeg,png,jpg',

   ]);

 	if ($request->isMethod('post'))
 	  {
 	      DB::beginTransaction();

 	      try{

 	          //update Room type

 	          $restaurant=Restaurant::findOrFail($request->id);
 	          $restaurant->title = $request->title;
 	          $restaurant->icon = $request->icon;
 	          $restaurant->description = $request->description;

            if($request->hasFile('image')){

                    // delete current image

                  if (File::exists(base_path('/assets/backend/image/restaurant/small/'.$restaurant->image))) 
                    {
                      File::delete(base_path('/assets/backend/image/restaurant/small/'.$restaurant->image));
                    }
                    if (File::exists(base_path('/assets/backend/image/restaurant/medium/'.$restaurant->image))) 
                    {
                      File::delete(base_path('/assets/backend/image/restaurant/medium/'.$restaurant->image));
                    }

                    if (File::exists(base_path('/assets/backend/image/restaurant/large/'.$restaurant->image)))
                     {
                       File::delete(base_path('/assets/backend/image/restaurant/large/'.$restaurant->image));
                     }

                     if (File::exists(base_path('/assets/backend/image/restaurant/original/'.$restaurant->image)))
                     {
                        File::delete(base_path('/assets/backend/image/restaurant/original/'.$restaurant->image));
                     }
                    // upload new image
                    $image=$request->image;
                    $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                    $original_image_path = base_path().'/assets/backend/image/restaurant/original/'.$image_name;
                    $large_image_path = base_path().'/assets/backend/image/restaurant/large/'.$image_name;
                    $medium_image_path = base_path().'/assets/backend/image/restaurant/medium/'.$image_name;
                    $small_image_path = base_path().'/assets/backend/image/restaurant/small/'.$image_name;

                    Image::make($image)->save($original_image_path);
                    Image::make($image)->resize(1050,850)->save($large_image_path);
                    Image::make($image)->resize(600,450)->save($medium_image_path);
                    Image::make($image)->resize(480,490)->save($small_image_path);
                    $restaurant->image = $image_name;
                
            }
 	            $restaurant->save();
 	          

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

  $data=Restaurant::findOrFail($request->item_id);
  if (File::exists(base_path('/assets/backend/image/restaurant/small/'.$data->image))) 
    {
      File::delete(base_path('/assets/backend/image/restaurant/small/'.$data->image));
    }
    if (File::exists(base_path('/assets/backend/image/restaurant/medium/'.$data->image))) 
    {
      File::delete(base_path('/assets/backend/image/restaurant/medium/'.$data->image));
    }

    if (File::exists(base_path('/assets/backend/image/restaurant/large/'.$data->image)))
     {
       File::delete(base_path('/assets/backend/image/restaurant/large/'.$data->image));
     }

     if (File::exists(base_path('/assets/backend/image/restaurant/original/'.$data->image)))
     {
        File::delete(base_path('/assets/backend/image/restaurant/original/'.$data->image));
     }
  $data->delete();
  $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];
  return \response()->json([
      'message' => 'Successfully deleted',
      'status_code' => 200
  ], Response::HTTP_OK);

 }
}
