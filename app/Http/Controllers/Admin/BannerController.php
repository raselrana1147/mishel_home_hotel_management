<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class BannerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatable()
    {
    	$datas=Banner::orderBy('id','DESC')->get();
    	
    	 return DataTables::of($datas)
    	 ->addIndexColumn()
    	  ->editColumn('image',function(Banner $data){
	           $url=$data->image ? asset("assets/backend/image/banner/".$data->image) 
	           :default_image();
	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
    	   })
	  	  ->editColumn('status',function(Banner $data){
      			return $data->status==0 ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>';
	  	   })
    	 ->editColumn('action',function(Banner $data){
    	          return '<a href="'.route('banner.edit',$data->id).'" class="btn btn-success btn-sm">
    	           <i class="icofont icofont-ui-edit"></i>
    	           </a>
    	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('banner.delete').'"  item_id="'.$data->id.'">
    	            <i class="icofont icofont-delete-alt"></i>
    	           </a>';
    	 })
    	->rawColumns(['image','status','action'])
    	 ->make(true);
    }


    public  function index()
    {
    	return view('admin.banner.index');
    }


    public function create()
    {
    	return view('admin.banner.create');
    }


    public function store(Request $request)
    {

    	$this->validate($request, [
    	     'image' => 'required',
    	     'type' => 'required',
    	 ]);

    	if ($request->isMethod('post'))
    	  {
    	      DB::beginTransaction();

    	      try{

    	          //create

    	          $banner = new Banner();

    	          $banner->title = $request->title;
    	          $banner->description = $request->description;
    	          $banner->type = $request->type;

    	          if($request->hasFile('image')){

    	                  $image=$request->image;
    	            
    	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
    	           
    	                  $image_path = base_path().'/assets/backend/image/banner/'.$image_name;

    	                  //Resize Image
    	                  if ($request->type=="explore_one") 
    	                  {
    	                  	Image::make($image)->resize(400,696)->save($image_path);
    	                  }elseif ($request->type=="explore_two") 
    	                  {
    	                  	Image::make($image)->resize(27,696)->save($image_path);
    	                  }elseif ($request->type=="city") 
    	                  {
    	                  	Image::make($image)->resize(1920,475)->save($image_path);
    	                  }elseif ($request->type=="contact_one") 
    	                  {
    	                  	Image::make($image)->resize(514,334)->save($image_path);
    	                  }elseif ($request->type=="contact_two") 
    	                  {
    	                  	Image::make($image)->resize(542,580)->save($image_path);
    	                  }elseif ($request->type=="footer") 
    	                  {
    	                  	Image::make($image)->resize(1920,750)->save($image_path);
    	                  }
    	                  
    	                  $banner->image = $image_name;
    	              
    	          }

    	          $banner->save();

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
        $data=Banner::findOrFail($id);
        return view('admin.Banner.edit',compact('data'));
    }


    public function update(Request $request)
    {

         $this->validate($request, [
              'type' => 'required',
          ]);
       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update
             	 $banner=Banner::findOrFail($request->id);
                 $banner->title = $request->title;
                 $banner->description = $request->description;
                 $banner->type = $request->type;

                 if($request->hasFile('image')){

                         $image=$request->image;
                   
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();

                         if (File::exists(base_path('/assets/backend/image/banner/'.$banner->image))) 
                           {
                             File::delete(base_path('/assets/backend/image/banner/'.$banner->image));
                           }
                  
                         $image_path = base_path().'/assets/backend/image/banner/'.$image_name;

                         //Resize Image
                         if ($request->type=="explore_one") 
                         {
                         	Image::make($image)->resize(310,435)->save($image_path);
                         }elseif ($request->type=="explore_two") 
                         {
                         	Image::make($image)->resize(230,435)->save($image_path);
                         }elseif ($request->type=="city") 
                         {
                         	Image::make($image)->resize(1920,475)->save($image_path);
                         }elseif ($request->type=="contact_one") 
                         {
                         	Image::make($image)->resize(514,334)->save($image_path);
                         }elseif ($request->type=="contact_two") 
                         {
                         	Image::make($image)->resize(542,580)->save($image_path);
                         }elseif ($request->type=="footer") 
                         {
                         	Image::make($image)->resize(1920,750)->save($image_path);
                         }
                         
                         $banner->image = $image_name;
                     
                 }

                 $banner->save();

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

     $data=Banner::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/banner/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/banner/'.$data->image));
       }
       
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
