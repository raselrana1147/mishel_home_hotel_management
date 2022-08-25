<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\FeedBack;
use App\Models\Review;

class ReviewFeedbackController extends Controller
{
    
        function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function datatable_feedback()
        {
        	$datas=FeedBack::orderBy('id','DESC')->get();
        	
        	 return DataTables::of($datas)
        	 ->addIndexColumn()
        	  ->editColumn('username',function(FeedBack $data){
    	           return $data->user->name;
        	   })
    	  	  ->editColumn('status',function(FeedBack $data){

          			return '<select  name="status" class="update_feedback" style="border-radius:4px" data-action="'.route('feedback.update_feedback').'" item_id="'.$data->id.'">
          				       <option value="1" '.($data->status=="publish" ? "selected" : "" ).'>publish</option>
          				       <option value="0" '.($data->status=="unpublish" ? "selected" : "" ).'>unpublish</option>
          			        </select>';
    	  	   })
        	 ->editColumn('action',function(FeedBack $data){
        	          return '
        	              <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('feedback.delete_feedback').'"  item_id="'.$data->id.'">
        	              <i class="icofont icofont-delete-alt"></i>
        	             </a>
        	          ';
        	 })
        	->rawColumns(['username','status','action'])
        	 ->make(true);
        }

          public function datatable_review()
        {
            $datas=Review::orderBy('id','DESC')->get();
            
             return DataTables::of($datas)
             ->addIndexColumn()
              ->editColumn('username',function(Review $data){
                   return $data->user->name;
               })
              ->editColumn('room',function(Review $data){
                   return $data->room->title;
               })
              ->editColumn('status',function(Review $data){

                    return '<select  name="status" class="update_review" style="border-radius:4px" data-action="'.route('review.update_review').'" item_id="'.$data->id.'">
                               <option value="1" '.($data->status=="publish" ? "selected" : "" ).'>publish</option>
                               <option value="0" '.($data->status=="unpublish" ? "selected" : "" ).'>unpublish</option>
                            </select>';
               })
             ->editColumn('action',function(Review $data){
                      return '
                          <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('review.delete_review').'"  item_id="'.$data->id.'">
                          <i class="icofont icofont-delete-alt"></i>
                         </a>
                      ';
             })
            ->rawColumns(['username','status','action'])
             ->make(true);
        }


	public  function feedback()
	{
		return view('admin.review_feedback.feedback');
	}
    public  function review()
    {
        return view('admin.review_feedback.review');
    }


	public function update_feedback(Request $request)
	{
		$feedback=FeedBack::findOrFail($request->id);
		$feedback->status=$request->status;
		$feedback->save();
		return \response()->json([
		    'message' => "Successfully updated",
		    'status_code' => 200
		], Response::HTTP_OK);
	}



    public function update_review(Request $request)
    {
        $review=Review::findOrFail($request->id);
        $review->status=$request->status;
        $review->save();
        return \response()->json([
            'message' => "Successfully updated",
            'status_code' => 200
        ], Response::HTTP_OK);
    }



    public function delete_feedback(Request $request)
    {
         $data=FeedBack::findOrFail($request->item_id);
         $data->delete();
         return \response()->json([
             'message' => 'Successfully deleted',
             'status_code' => 200
         ], Response::HTTP_OK);
    }


    public function delete_review(Request $request)
    {
         $data=Review::findOrFail($request->item_id);
         $data->delete();
         return \response()->json([
             'message' => 'Successfully deleted',
             'status_code' => 200
         ], Response::HTTP_OK);
    }
}
