<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\FeedBack;

class ReviewController extends Controller
{

   function __construct()
   {
     $this->middleware('auth',['only'=>'feedback','store_feedback']);
   }
    
    public function guest_review(Request $request)
    {

    	if (Auth::user()) {
    		      $review=new Review();
              $review->ratting=$request->ratting;
              $review->comment=$request->comment;
              $review->user_id=Auth::user()->id;
              $review->room_id=$request->room_id;
              $review->save();
              $notification=['status'=>'200', 'type'=>'success','message'=>'Review added successfully'];
    	}else{
    		$notification=['status'=>'401', 'type'=>'warning','route'=>route('login'),'message'=>'Please login'];
    	}
    	echo json_encode($notification);
    }


    public function feedback()
    {
       return view('front.feedback');
    }

    public function store_feedback(Request $request)
    {
          if ($request->isMethod('post')) 
          {
             DB::beginTransaction();
             try {
               $feed_back=new FeedBack();
               $feed_back->title=$request->title;
               $feed_back->comment=$request->comment;
               $feed_back->user_id=Auth::user()->id;
               $feed_back->save();
               $notification=['status'=>'200', 'type'=>'success','message'=>'Review added successfully'];
               DB::commit();
             } catch (Exception $e) {
               DB::rollBack();
               $error = $e->getMessage();
               $notification=['status'=>Response::HTTP_INTERNAL_SERVER_ERROR, 'type'=>'success','message'=>$error];
             }
          }

         echo json_encode($notification);
    }
}
