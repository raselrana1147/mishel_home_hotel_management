<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index()
	{
		$total_room=DB::table('rooms')->count();
		$total_room_type=DB::table('room_types')->count();
		$total_amentity=DB::table('amenities')->count();
		$restaurants=DB::table('restaurants')->count();
		return view('admin.index',compact('total_room','total_room_type','total_amentity','restaurants'));
	}

	    public function contact_datatable()
	    {
	    	$datas=Contact::orderBy('id','DESC')->get();
	    	
	    	 return DataTables::of($datas)
	    	 ->addIndexColumn()
	    	 ->make(true);
	    }

	public function contact(){

		return view('admin.contact');
	}
        

    
}
