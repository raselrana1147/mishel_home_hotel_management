@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Booking this room</h2>
				<ul>
					<li>
						<a href="front_page">
							Home 
						</a>
					</li>
					<li>Room</li>
					
				</ul>
			</div>
		</div>
	</div>
	

			<!-- Start Book Table Area -->
			<section class="book-table-area-three">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-4 col-md-4 p-0">
							<div class="books-froms-wrap">
								<div class="d-table">
									<div class="d-table-cell">
										<div class="book-from books-froms">
											<h3>Booking Detail Info</h3>
											<form id="submit_booking" data-action="{{ route('store_room_booking') }}" method="post">
												@csrf
												<input type="hidden" name="room_id" value="{{$room->id}}">
												<div class="form-group">
													<div class="select-box">
														<i class='bx bx-user'></i>
														<select class="form-control" name="num_of_guest">
															<option value="">Number of  Guest</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
														<span class="error_num_of_guest text-danger"></span>
													</div>

												</div>
												<div class="form-group">
													<div class="select-box">
														<i class='bx bx-calendar'></i>
														<div class="input-group date" id="datetimepicker-3">
															<input type="text" class="form-control" placeholder="Date" name="date">
															<span class="input-group-addon">
																<i class="glyphicon glyphicon-th"></i>
															</span>
															<span class="error_date text-danger"></span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="select-box">
														<i class='bx bx-calendar'></i>
														<input type="text" name="duration" class="form-control" placeholder="Duration as day">
														<span class="error_duration text-danger"></span>
													</div>
												</div>
												<button type="submit" class="default-btn submit_button">
													Confirm Booking
													<i class="flaticon-right"></i>
												</button>
											
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 p-0">
							<div class="books-froms-wrap">
								<div class="d-table">
									<div class="d-table-cell">
										<div class="book-from books-froms">
											<h3>Guest Detail Info</h3>
											
												
												<div class="form-group">
													<div class="select-box">
														<i class='bx bx-user'></i>
														<input type="text" name="guest_name" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
														<span class="error_guest_name text-danger"></span>
													</div>
												</div>
											
											<div class="form-group">
												<div class="select-box">
													<i class='bx bx-phone'></i>
													<input type="text" name="guest_phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Phone">
													<span class="error_guest_phone text-danger"></span>
												</div>
											</div>

											<div class="form-group">
												<div class="select-box">
													<i class='bx bx-message'></i>
													<input type="text" name="guest_email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email">
													<span class="error_guest_email text-danger"></span>
												</div>
											</div>

											<div class="form-group">
												<div class="select-box">
													<i class='bx bx-detail'></i>
													<input type="text" name="guest_address" class="form-control" value="{{Auth::user()->address}}" placeholder="Address">
													<span class="error_guest_address text-danger"></span>
												</div>
											</div>
												
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 p-0">
							<div class="contact-info-wrap">
								<div class="contact-info">
									<h3>Our Contract Info</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adip suspendisse ultrices gravida. Risus commodo svel facilisis.</p>
									<ul>
										<li>
											<a href="tel:+800-987-65-43">
												<i class='bx bx-phone-call'></i>
												{{config('constant.company_phone1')}}
											</a>
										</li>
										<li>
											<a href="tel:+800-987-65-43">
												<i class='bx bx-phone-call'></i>
												{{config('constant.company_phone2')}}
											</a>
										</li>
									</ul>
									<ul>
										<li>
											<a href="mailto:hello@ecorik.com">
												<i class='bx bx-envelope'></i>
												{{config('constant.company_email')}}
											</a>
										</li>
										<li>
											<a href="mailto:info@ecorik.com">
												<i class='bx bx-envelope'></i>
												{{config('constant.company_email2')}}
											</a>
										</li>
									</ul>
									<span>
										<i class='bx bx-location-plus'></i>
										{{config('constant.company_adsress')}}
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End  Book Table Area -->

			<!-- Start Booking Area -->
			<section class="bokking-area pt-100 pb-70">
				<div class="container">
					<div class="section-title">
						<span>Booking</span>
						<h2>Direct booking benefits</h2>
					</div>

					<div class="row">
						<div class="booking-col-2">
							<div class="single-booking">
								<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
									<i class="book-icon flaticon-online-booking"></i>
									<span class="booking-title">Free cost</span>
									<h3>No booking fee</h3>
								</a>
								
								<div class="modal fade" id="staticBackdrop">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">No booking fee</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
											</div>

											<div class="modal-footer">
												<a href="book-table.html" class="default-btn">
													Book Now
													<i class="flaticon-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="booking-col-2">
							<div class="single-booking">
								<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">
									<i class="book-icon flaticon-podium"></i>
									<span class="booking-title">Free cost</span>
									<h3>Best rate guarantee</h3>
								</a>

								<div class="modal fade" id="staticBackdrop-2">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Best rate guarantee</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
											</div>

											<div class="modal-footer">
												<a href="book-table.html" class="default-btn">
													Book Now
													<i class="flaticon-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="booking-col-2">
							<div class="single-booking">
								<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-3">
									<i class="book-icon flaticon-airport"></i>
									<span class="booking-title">Free cost</span>
									<h3>Reservations 24/7</h3>
								</a>

								<div class="modal fade" id="staticBackdrop-3">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Reservations 24/7</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
											</div>

											<div class="modal-footer">
												<a href="book-table.html" class="default-btn">
													Book Now
													<i class="flaticon-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="booking-col-2">
							<div class="single-booking">
								<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-4">
									<i class="book-icon flaticon-slow"></i>
									<span class="booking-title">Free cost</span>
									<h3>High-speed Wi-Fi</h3>
								</a>

								<div class="modal fade" id="staticBackdrop-4">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">High-speed Wi-Fi</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
											</div>

											<div class="modal-footer">
												<a href="book-table.html" class="default-btn">
													Book Now
													<i class="flaticon-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="booking-col-2">
							<div class="single-booking">
								<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop-5">
									<i class="book-icon flaticon-coffee-cup-1"></i>
									<span class="booking-title">Free cost</span>
									<h3>Free breakfast</h3>
								</a>

								<div class="modal fade" id="staticBackdrop-5">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Free breakfast</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>

											<div class="modal-body">
												<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo neque eum tempore ducimus odit esse porro aperiam, delectus sunt omnis sed quod alias. Natus voluptate nemo explicabo fugiat quibusdam cupiditate quod alias. Natus voluptate.</p>
											</div>
											
											<div class="modal-footer">
												<a href="book-table.html" class="default-btn">
													Book Now
													<i class="flaticon-right"></i>
												</a>
											</div>
										</div>
									</div>
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
			$('body').on('submit','#submit_booking',function(e){
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
			           if (data.type=="success") 
			           {
			           	sweet(data.message,'success');
			            $("#submit_booking")[0].reset();
			            $(".submit_button").text("Success").prop('disabled', false)
 
			           }  
			       },

			       error:function(response){

			            if (response.status === 422) {
			               
			                   if (response.responseJSON.errors.hasOwnProperty('num_of_guest')) {
			                        $('.error_num_of_guest').html(response.responseJSON.errors.num_of_guest)      
			                    }else{
			                        $('.error_num_of_guest').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('date')) {
			                        $('.error_date').html(response.responseJSON.errors.date)      
			                    }else{
			                        $('.error_date').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('duration')) {
			                        $('.error_duration').html(response.responseJSON.errors.duration)      
			                    }else{
			                        $('.error_duration').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('guest_name')) {
			                        $('.error_guest_name').html(response.responseJSON.errors.guest_name)      
			                    }else{
			                        $('.error_guest_name').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('guest_phone')) {
			                        $('.error_guest_phone').html(response.responseJSON.errors.guest_phone)      
			                    }else{
			                        $('.error_guest_phone').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('guest_email')) {
			                        $('.error_guest_email').html(response.responseJSON.errors.guest_email)      
			                    }else{
			                        $('.error_guest_email').html('') 
			                    }

			                    if (response.responseJSON.errors.hasOwnProperty('guest_address')) {
			                        $('.error_guest_address').html(response.responseJSON.errors.guest_address)      
			                    }else{
			                        $('.error_guest_address').html('') 
			                    }  

			                    $(".submit_button").html('Confirm Booking<i class="flaticon-right"></i>').prop('disabled', false)  
			            }
			       }

			     });
			});
		})
	</script>
@endsection