@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Provide your valuable feedback</h2>
				<ul>
					<li>
						<a href="{{ route('front_page') }}">
							Home 
						</a>
					</li>
					<li>Feedback</li>
					
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
					
						<div class="ask-question">
							<h3>Guest Feedback</h3>
							<form id="submit_form" data-action="{{ route('guest_feedback') }}" method="post">
								@csrf
								
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
										<input type="text" name="title" class="form-control" placeholder="Caption or title" required="">
										
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