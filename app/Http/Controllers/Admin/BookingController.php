<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Booking;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;


class BookingController extends Controller
{
    

        function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function datatable()
        {
        	$datas=Booking::orderBy('id','DESC')->get();
        	
        	 return DataTables::of($datas)
        	 ->addIndexColumn()
        	  ->editColumn('room',function(Booking $data){
    	           return  '<a href="" class="btn btn-link">
        	           '.$data->room->title. ' '. $data->room->room_number.'
        	           </a>';         
        	   })
    	  	  ->editColumn('status',function(Booking $data){
          			return '<select  name="status" class="update_booking" style="border-radius:4px" data-action="'.route('booking.update_status').'" item_id="'.$data->id.'">
                               <option value="pending" '.($data->status=="pending" ? "selected" : "" ).'>pending</option>
                               <option value="approved" '.($data->status=="approved" ? "selected" : "" ).'>approved</option>
                               <option value="declined" '.($data->status=="declined" ? "selected" : "" ).'>declined</option>
                            </select>';
    	  	   })
        	 
        	->rawColumns(['room','status'])
        	 ->make(true);
        }


    public  function index()
    {
    	return view('admin.booking.index');
    }


    public function update_status(Request $request)
    {
        $booking=Booking::findOrFail($request->id);
        $booking->status=$request->status;
        $booking->save();
        return \response()->json([
            'message' => "Successfully updated",
            'status_code' => 200
        ], Response::HTTP_OK);
    }
}
