@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Detail About This Room</h2>
				<ul>
					<li>
						<a href="{{ route('front_page') }}">
							Home 
						</a>
					</li>
					<li>Room</li>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->

	<!-- End Service Details Area -->
	<section class="service-details-area room-details-right-sidebar ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="service-details-wrap service-right">
						<div class="service-img-wrap owl-carousel owl-theme mb-30">
							<div class="single-services-imgs">
								<img src="{{ asset('assets/backend/image/room/small/'.$room->image) }}" alt="Image">
							</div>
							
						</div>
						{!!$room->description!!}

						<div class="ask-question">
							<h3>Guest Comment</h3>
							<form id="submit_form" data-action="{{ route('guest_review') }}" method="post">
								@csrf
								<input type="hidden" name="room_id" value="{{$room->id}}">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
										<select class="form-control" name="ratting" required="">
											<option value="">Select Ratting</option>
											<option value="1">&#9733;</option>
											<option value="2">&#9733;&#9733;</option>
											<option value="3">&#9733;&#9733;&#9733;</option>
											<option value="4">&#9733;&#9733;&#9733;&#9733;</option>
											<option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
																				
									    </select>
										
										</div>
									</div><br><br><br>
		
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<textarea name="comment" class="form-control"  cols="30" rows="5" required  placeholder="Your Message"></textarea>
											
										</div>
									</div>
		
									<div class="col-lg-12 col-md-12">
										<button type="submit" class="default-btn btn-two submit_button">
											<span class="label">
												Booking Now
												<i class="flaticon-right"></i>
											</span>
										</button>
										<div id="msgSubmit" class="h3 text-center hidden "></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="service-sidebar-area">
						<div class="service-list service-card">
							<h3 class="service-details-title">Amentities</h3>
							<ul>
								@foreach ($room->room_type->amenities as $amenity)
									<li>
										{{$amenity->name}}
										<i class='bx bx-check'></i>
									</li>
								@endforeach
							</ul>
						</div>
						
						<div class="service-list service-card">
							<h3 class="service-details-title">Contact Info</h3>
							<ul>
								<li>
									<a href="tel:+8006036035">
										+800 603 6035
										<i class='bx bx-phone-call bx-rotate-270'></i>
									</a>
								</li>
								<li>
									<a href="mailto:hello@ecorik.com">
										hello@ecorik.com
										<i class='bx bx-envelope'></i>
									</a>
								</li>
								<li>
									123, Western Road, Australia
									<i class='bx bx-location-plus'></i>
								</li>
								<li>
									9:00 AM – 8:00 PM
									<i class='bx bx-time'></i>
								</li>
							</ul>
						</div>
						<div class="service-list service-card">
							<h3 class="service-details-title">Guest Review</h3>
							<ul>
								@foreach ($room->reviews as $review)
								
								<li>
									<div>
										<div class="review-profile">
											<img src="{{ asset('assets/frontend/image/default.png') }}">
										</div>
										<div class="review-date">
											{{date('d/m/Y',strtotime($review->created_at))}}
										</div>
										<p class="ratting">

											@for ($i = 0; $i <5 ; $i++)
											@if ($i<$review->ratting)
												<span class="text-yellow">&#9733;</span>
												@else
												<span>&#9733;</span>
											@endif
												
											@endfor
											
											
										</p>
										<p>{{$review->comment}}</p>
									</div>
									
								</li>
									
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('js')
	<script>
		$(document).ready(function(){
		       $('body').on('submit','#submit_form',function(e){
		            e.preventDefault();
		            let formDta = new FormData(this);
		            $(".submit_button").html("Processing...").prop('disabled', true)
		            $.ajax({
		              url: $(this).attr('data-action'),
		              method: "POST",
		              data: formDta,
		              cache: false,
		              contentType: false,
		              processData: false,
		              success:function(response){
		                  let data=JSON.parse(response)
		                  if (data.status==401) 
		                  {
		                    window.location = data.route
		                    sweet(data.message,'warning');
		                    
		                  }else
		                  {
		                  	sweet(data.message,'success');
		                  	$("#submit_form")[0].reset();
		                  	$(".submit_button").text("Success").prop('disabled', false)
		                  }
		              },

		              error:function(response){}

		            });
		       });

		     })
	</script>
@endsection