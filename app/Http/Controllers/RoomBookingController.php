<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use App\Models\Admin\Booking;

class RoomBookingController extends Controller
{
     function __construct()
    {
        $this->middleware('auth');
    }
   


    public function room_booking($slug)
    {
    	$room=DB::table('rooms')->where('slug',$slug)->first();
    	return view('front.room_booking',compact('room'));
    }

    public function store_room_booking(Request $request)
    {
    	

    	$request->validate([
    	    'num_of_guest' => ['required', 'integer'],
    	    'date' => ['required', 'string'],
    	    'duration' => ['required','integer'],
    	    'guest_name' => ['required'],
    	    'guest_phone' => ['required'],
    	    'guest_email' => ['required'],
    	    'guest_address' => ['required'],
    	]);


    	if ($request->isMethod("POST")) {
    	         DB::beginTransaction();
    	    try {
    	         $booking=new Booking();
    	         $booking->room_id=$request->room_id;
    	         $booking->user_id=Auth::user()->id;
    	         $booking->num_of_guest=$request->num_of_guest;
    	         $booking->date=$request->date;
    	         $booking->duration=$request->duration;
    	         $booking->guest_name=$request->guest_name;
    	         $booking->guest_phone=$request->guest_phone;
    	         $booking->guest_email=$request->guest_email;
    	         $booking->guest_address=$request->guest_address;

    	         $booking->save();
    	         DB::commit();
    	         $notification=['status'=>'200', 'type'=>'success','message'=>'Successfully booking'];
    	         
    	    } catch (QueryException $e) {
    	         DB::rollBack();
    	         $e=$e->getMessage();
    	         $notification=['status'=>'422', 'type'=>'error','message'=>$e];
    	    }
    	}
    	 echo json_encode($notification);
    }
}
