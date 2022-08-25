<?php 
	use Illuminate\Support\Facades\DB;
	use App\Models\Admin\Room;
	use App\Models\Review;

	function default_image()
	{
		$default_image=url('').'/assets/backend/image/common/default.jpg';
		return $default_image;
	}

	function logo()
	{
		$logo=url('').'/assets/backend/image/common/logo.png';
		return $logo;
	}

	function galleries()
	{
		$galleries=DB::table('galleries')->where(['status'=>0,'type'=>'picture'])
		->orderBy('id','desc')->get();
		return $galleries;
	}

	function price_format($price)
	{
		return '৳'.number_format($price,2);
	}

	function room_types()
	{
		return $room_type=DB::table('room_types')->where(['status'=>0])->get();
	}

	function rooms()
	{
		return $rooms=Room::
		where(['status'=>0])
		->latest()->take(5)->get();
	}

	function banner($type)
	{
	     $banner=DB::table('banners')->where('type',$type)->first();
	     $banner=url('').'/assets/backend/image/banner/'.$banner->image;
	     return $banner;
	}

	function total_data($table)
	{
	     return $data=DB::table($table)->where(['status'=>0])->count();
	}

	function max_ratting($id)
	{
		$max_ratting=Review::where('room_id',$id)->max('ratting');
		return $max_ratting;
	}


	function socials()
	{
		$data=DB::table('socials')->orderBy('id','desc')->get();
		return $data;
	}




 ?>