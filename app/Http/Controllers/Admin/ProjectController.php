<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Image;

class ProjectController extends Controller
{
    

      function __construct()
      {
          $this->middleware('auth:admin');
      }

      public function datatable()
      {
      	$datas=Project::orderBy('id','DESC')->get();
      	
      	 return DataTables::of($datas)
      	 ->addIndexColumn()

      	  ->editColumn('image',function(Project $data){
  	           $url=$data->image ? asset("assets/backend/image/project/small/".$data->image) 
  	           :asset("assets/backend/image/".default_image());
  	           return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
      	   })

      	  ->editColumn('description',function(Project $data){
  	           return strip_tags($data->description);
      	   })
  	  	  
      	 ->editColumn('action',function(Project $data){
      	          return '<a href="'.route('project.edit',$data->id).'" class="btn btn-success btn-sm">
      	           <i class="icofont icofont-ui-edit"></i>
      	           </a>
      	            <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('project.delete').'"  item_id="'.$data->id.'">
      	            <i class="icofont icofont-delete-alt"></i>
      	           </a>';
      	 })
      	->rawColumns(['image','description','action'])
      	 ->make(true);
      }

      public  function index()
      {
      	return view('admin.project.index');
      }
      public function create()
      {
      	return view('admin.project.create');
      }

      public function store(Request $request)
      {

      	$this->validate($request, [
      	     'name' => 'required',
      	     'description' => 'required',
      	     'image' => 'required',
      	 ]);

      	if ($request->isMethod('post'))
      	  {
      	      DB::beginTransaction();

      	      try{

      	          //create

      	          $project = new Project();
      	          $project->name=$request->name;
      	          $project->description=$request->description;

      	          if($request->hasFile('image')){

      	                  $image=$request->image;
      	            
      	                  $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
      	                  $original_image_path = base_path().'/assets/backend/image/project/original/'.$image_name;
      	                  $large_image_path = base_path().'/assets/backend/image/project/large/'.$image_name;
      	                  $medium_image_path = base_path().'/assets/backend/image/project/medium/'.$image_name;
      	                  $small_image_path = base_path().'/assets/backend/image/project/small/'.$image_name;

      	                  //Resize Image
      	                  Image::make($image)->save($original_image_path);
      	                  Image::make($image)->resize(1920,680)->save($large_image_path);
      	                  Image::make($image)->resize(1920,1080)->save($medium_image_path);
      	                  Image::make($image)->resize(385,355)->save($small_image_path);
      	                  $project->image = $image_name;
      	              
      	          }

      	          $project->save();

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
          $data=Project::findOrFail($id);
          return view('admin.project.edit',compact('data'));
      }

      public function update(Request $request)
      {

           $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                
            ]);

         if ($request->isMethod('post'))
           {
               DB::beginTransaction();

               try{

                   //update Slider
                   $project=Project::findOrFail($request->id);
                   $project->name=$request->name;
                   $project->description=$request->description;
                   
                   if($request->hasFile('image')){

                           // delete current image

                         if (File::exists(base_path('/assets/backend/image/project/small/'.$project->image))) 
                           {
                             File::delete(base_path('/assets/backend/image/project/small/'.$project->image));
                           }
                           if (File::exists(base_path('/assets/backend/image/project/medium/'.$project->image))) 
                           {
                             File::delete(base_path('/assets/backend/image/project/medium/'.$project->image));
                           }

                           if (File::exists(base_path('/assets/backend/image/project/large/'.$project->image)))
                            {
                              File::delete(base_path('/assets/backend/image/project/large/'.$project->image));
                            }

                            if (File::exists(base_path('/assets/backend/image/project/original/'.$project->image)))
                            {
                               File::delete(base_path('/assets/backend/image/project/original/'.$project->image));
                            }
                           // upload new image
                           $image=$request->image;
                           $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                           $original_image_path = base_path().'/assets/backend/image/project/original/'.$image_name;
                           $large_image_path = base_path().'/assets/backend/image/project/large/'.$image_name;
                           $medium_image_path = base_path().'/assets/backend/image/project/medium/'.$image_name;
                           $small_image_path = base_path().'/assets/backend/image/project/small/'.$image_name;

                           //Resize Image
                         Image::make($image)->save($original_image_path);
                         Image::make($image)->resize(1920,680)->save($large_image_path);
                         Image::make($image)->resize(1920,1080)->save($medium_image_path);
                         Image::make($image)->resize(385,355)->save($small_image_path);
                         $project->image = $image_name;
                       
                   }

                   $project->save();

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

       $data=Project::findOrFail($request->item_id);

       if (File::exists(base_path('/assets/backend/image/project/small/'.$data->image))) 
         {
           File::delete(base_path('/assets/backend/image/project/small/'.$data->image));
         }
         if (File::exists(base_path('/assets/backend/image/project/medium/'.$data->image))) 
         {
           File::delete(base_path('/assets/backend/image/project/medium/'.$data->image));
         }

         if (File::exists(base_path('/assets/backend/image/project/large/'.$data->image)))
          {
            File::delete(base_path('/assets/backend/image/project/large/'.$data->image));
          }

          if (File::exists(base_path('/assets/backend/image/project/original/'.$data->image)))
          {
             File::delete(base_path('/assets/backend/image/project/original/'.$data->image));
          }
       $data->delete();
       $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

       return \response()->json([
           'message' => 'Successfully deleted',
           'status_code' => 200
       ], Response::HTTP_OK);

      }
}
