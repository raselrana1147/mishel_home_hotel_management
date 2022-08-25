<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gallery;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class GalleryController extends Controller
{
      function __construct()
      {
          $this->middleware('auth:admin');
      }

      public function datatable()
      {
      	$datas=Gallery::orderBy('id','DESC')->get();
      	
      	 return DataTables::of($datas)
      	 ->addIndexColumn()
      	  ->editColumn('image',function(Gallery $data){
  	           $url=$data->image ? asset("assets/backend/image/gallery/small/".$data->image) 
  	           :asset("assets/backend/image/".default_image());
  	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
      	   })
  	  	  ->editColumn('status',function(Gallery $data){
        			return $data->status==0 ? '<label class="text-success">Active</label>' : '<label class="text-danger">Inactive</label>';
  	  	   })
      	 ->editColumn('action',function(Gallery $data){
      	          return '<a href="'.route('gallery.edit',$data->id).'" class="btn btn-success btn-sm">
      	           <i class="icofont icofont-ui-edit"></i>
      	           </a>
      	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('gallery.delete').'"  item_id="'.$data->id.'">
      	            <i class="icofont icofont-delete-alt"></i>
      	           </a>';
      	 })
      	->rawColumns(['image','status','action'])
      	 ->make(true);
      }

      public  function index()
      {
      	return view('admin.gallery.index');
      }
      public function create()
      {
      	return view('admin.gallery.create');
      }


      public function store(Request $request)
      {

      	$this->validate($request, [
      	     'type' => 'required',
      	 ]);

      	if ($request->isMethod('post'))
      	  {
      	      DB::beginTransaction();

      	      try{

      	          //create Gallery

      	          $gallery = new Gallery();
                  if ($request->has('title')) 
                  {
                     $gallery->title=$request->title;
                  }
                  if ($request->has('link')) 
                  {
                    $gallery->link=$request->link;
                  }
                 
                  
                  $gallery->type=$request->type;

      	          if($request->hasFile('image')){

      	                  $image=$request->image;
      	            
      	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
      	                  $original_image_path = base_path().'/assets/backend/image/gallery/original/'.$image_name;
      	                  $large_image_path = base_path().'/assets/backend/image/gallery/large/'.$image_name;
      	                  $medium_image_path = base_path().'/assets/backend/image/gallery/medium/'.$image_name;
      	                  $small_image_path = base_path().'/assets/backend/image/gallery/small/'.$image_name;

      	                  //Resize Image
      	                  Image::make($image)->save($original_image_path);
      	                  Image::make($image)->resize(1920,680)->save($large_image_path);
      	                  Image::make($image)->resize(1920,1080)->save($medium_image_path);
      	                  Image::make($image)->resize(385,355)->save($small_image_path);
      	                  $gallery->image = $image_name;
      	              
      	          }

      	          $gallery->save();

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
          $data=Gallery::findOrFail($id);
          return view('admin.gallery.edit',compact('data'));
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

                   //update gallery
                   $gallery=Gallery::findOrFail($request->id);
                   if ($request->has('title')) 
                   {
                      $gallery->title=$request->title;
                   }
                   if ($request->has('link')) 
                   {
                     $gallery->link=$request->link;
                   }
                   $gallery->type=$request->type;
                   
                   if($request->hasFile('image')){

                           // delete current image

                         if (File::exists(base_path('/assets/backend/image/gallery/small/'.$gallery->image))) 
                           {
                             File::delete(base_path('/assets/backend/image/gallery/small/'.$gallery->image));
                           }
                           if (File::exists(base_path('/assets/backend/image/gallery/medium/'.$gallery->image))) 
                           {
                             File::delete(base_path('/assets/backend/image/gallery/medium/'.$gallery->image));
                           }

                           if (File::exists(base_path('/assets/backend/image/gallery/large/'.$gallery->image)))
                            {
                              File::delete(base_path('/assets/backend/image/gallery/large/'.$gallery->image));
                            }

                            if (File::exists(base_path('/assets/backend/image/gallery/original/'.$gallery->image)))
                            {
                               File::delete(base_path('/assets/backend/image/gallery/original/'.$gallery->image));
                            }
                           // upload new image
                           $image=$request->image;
                           $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                           $original_image_path = base_path().'/assets/backend/image/gallery/original/'.$image_name;
                           $large_image_path = base_path().'/assets/backend/image/gallery/large/'.$image_name;
                           $medium_image_path = base_path().'/assets/backend/image/gallery/medium/'.$image_name;
                           $small_image_path = base_path().'/assets/backend/image/gallery/small/'.$image_name;

                           //Resize Image
                         Image::make($image)->save($original_image_path);
                         Image::make($image)->resize(1920,680)->save($large_image_path);
                         Image::make($image)->resize(1920,1080)->save($medium_image_path);
                         Image::make($image)->resize(385,355)->save($small_image_path);
                         $gallery->image = $image_name;
                       
                   }

                   $gallery->save();

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

       $data=Gallery::findOrFail($request->item_id);

       if (File::exists(base_path('/assets/backend/image/gallery/small/'.$data->image))) 
         {
           File::delete(base_path('/assets/backend/image/gallery/small/'.$data->image));
         }
         if (File::exists(base_path('/assets/backend/image/gallery/medium/'.$data->image))) 
         {
           File::delete(base_path('/assets/backend/image/gallery/medium/'.$data->image));
         }

         if (File::exists(base_path('/assets/backend/image/gallery/large/'.$data->image)))
          {
            File::delete(base_path('/assets/backend/image/gallery/large/'.$data->image));
          }

          if (File::exists(base_path('/assets/backend/image/gallery/original/'.$data->image)))
          {
             File::delete(base_path('/assets/backend/image/gallery/original/'.$data->image));
          }
       $data->delete();
       $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

       return \response()->json([
           'message' => 'Successfully deleted',
           'status_code' => 200
       ], Response::HTTP_OK);

      }
}
