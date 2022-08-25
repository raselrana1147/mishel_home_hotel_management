<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin\Room;
use App\Models\Admin\Project;
use App\Mail\ContactMail;
use App\Models\Contact;


class HomeController extends Controller
{
    public function index()
    {
    	$sliders=DB::table('sliders')->where(['type'=>'slider','status'=>0])
    	->orderBy('id','desc')->get();
    	$rooms=Room::where(['status'=>0])->orderBy('id','desc')->get();
    	$restaurants=DB::table('restaurants')->where(['status'=>0])
    	->orderBy('id','desc')->get();

      $feed_backs=DB::table('feed_backs')
      ->join('users','feed_backs.user_id','=','users.id')
      ->select('feed_backs.*','users.name as guest_name')
      ->where(['status'=>1])
      ->orderBy('id','desc')->get();
      
    	
    	return view('index',compact('sliders','rooms','restaurants','feed_backs'));
    }


    public function room_detail($slug)
    {
         $room=Room::where('slug',$slug)->first();
         return view('front.room_detail',compact('room'));
    }


    public function type_wise_room($id)
    {
         $rooms=Room::where(['room_type_id'=>$id,'status'=>0])->get();
         return view('front.type_wise_room',compact('rooms'));
    }

    public function about_us()
    {
       $feed_backs=DB::table('feed_backs')
       ->join('users','feed_backs.user_id','=','users.id')
       ->select('feed_backs.*','users.name as guest_name')
       ->where(['status'=>1])
       ->orderBy('id','desc')->get();

      return view('about_us',compact('feed_backs'));
    }

    public function contact_us()
    {
         return view('contact_us');
    }

    public function submit_contact(Request $request)
    {
       // $data=[
       //        'name'=>$request->name,
       //        'email'=>$request->email,
       //        'phone'=>$request->phone_number,
       //        'subject'=>$request->msg_subject,
       //        'message'=>$request->message,
       //    ];

        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone_number;
        $contact->subject=$request->msg_subject;
        $contact->message=$request->message;
        $contact->save();

       $notification=['status'=>'200', 'type'=>'success','message'=>"Contact Message send successfully"];
        
       /// Mail::send(new ContactMail($data));
       // return back();
        // if ($mainSend) {
         
        //   $notification=['status'=>'200', 'type'=>'success','message'=>"Contact Message send successfully"];
        // }else{
        //     $notification=['status'=>'401', 'type'=>'warning','message'=>"Something went wrong"];
        // }
        
        echo json_encode($notification);
    }

    public function privacy_policy()
    {
         return view('privacy_policy');
    }

    public function project()
    {
       $projects=DB::table('projects')->orderBy('id','desc')->get();
        return view('front.project',compact('projects'));
    }

    public function project_detail($id)
    {
        $project=Project::findOrFail($id);
        return view('front.project_detail',compact('project'));
    }


    public function gallery()
    {
       $galleries=DB::table('galleries')->orderBy('id','desc')->where(['status'=>0])->get();
       return view('front.gallery',compact('galleries'));
    }


}
