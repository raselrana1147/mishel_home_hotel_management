@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
 <div class="page-title-area" style="background: url({{banner('city')}});">
 	<div class="container">
 		<div class="page-title-content">
 			<h2>Contact us</h2>
 			<ul>
 				<li>
 					<a href="{{ route('front_page') }}">
 						Home 
 					</a>
 				</li>
 				<li>Contact us</li>
 				
 			</ul>
 		</div>
 	</div>
 </div>

 <section class="contact-info-area pt-100 pb-70">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-contact-info">
 					<i class="bx bx-envelope"></i>
 					<h3>Email Us:</h3>
 					<a href="mailto:hello@ecorik.com">{{config('constant.company_email')}}</a>
 					<a href="mailto:info@ecorik.com">{{config('constant.company_email2')}}</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-contact-info">
 					<i class="bx bx-phone-call"></i>
 					<h3>Call Us:</h3>
 					<a href="tel:+(123)1800-567-8990">Phone + {{config('constant.company_phone1')}}</a>
 					<a href="tel:+(124)1523-567-9874">Phone + {{config('constant.company_phone2')}}</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-contact-info">
 					<i class="bx bx-location-plus"></i>
 					<h3>Location</h3>
 					<a href="#">{{config('constant.company_address')}}</a>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-contact-info">
 					<i class="bx bx-phone-call"></i>
 					<h3>Call Us:</h3>
 					<a href="tel:+(123)1800-567-8990">Help Line + {{config('constant.help_line1')}}</a>
 					<a href="tel:+(124)1523-567-9874">help Line + {{config('constant.help_line2')}}</a>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Contact Info Area -->

 <!-- Start Contact Area -->
 <section class="main-contact-area pb-100">
 	<div class="container">
 		<div class="row">
 			<div class="col-12">
 				<div class="contact-wrap mb-0">
 					<div class="contact-form">
 						<div class="section-title">
 							<h2>Drop us a message for any query</h2>
 						</div>
 						<form id="contactForm" data-action="{{ route('submit_contact') }}" method="post">
 							@csrf
 							<div class="row">
 								<div class="col-lg-6 col-sm-6">
 									<div class="form-group">
 										<input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
 										<div class="help-block with-errors"></div>
 									</div>
 								</div>
 	
 								<div class="col-lg-6 col-sm-6">
 									<div class="form-group">
 										<input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
 										<div class="help-block with-errors"></div>
 									</div>
 								</div>
 	
 								<div class="col-lg-6 col-sm-6">
 									<div class="form-group">
 										<input type="text" name="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
 										<div class="help-block with-errors"></div>
 									</div>
 								</div>
 	
 								<div class="col-lg-6 col-sm-6">
 									<div class="form-group">
 										<input type="text" name="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
 										<div class="help-block with-errors"></div>
 									</div>
 								</div>
 	
 								<div class="col-lg-12 col-md-12">
 									<div class="form-group">
 										<textarea name="message" class="form-control" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
 										<div class="help-block with-errors"></div>
 									</div>
 								</div>
 	
 								<div class="col-lg-12 col-md-12">
 									<button type="submit" class="default-btn btn-two submit_button">
 										Send Message
 										<i class="flaticon-right"></i>
 									</button>
 									<div id="msgSubmit" class="h3 text-center hidden"></div>
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
 <!-- End Contact Area -->

 <!-- Start Map Area -->
 <div class="map-area">
 	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1166.981544051765!2d90.41831347746418!3d23.753862102051112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b87ba746007b%3A0xbfdfc528cd29daf8!2sKhilgaon%20Chowdhury%20Para%20(Matir%20Masjid)%20Jame%20Masjid!5e0!3m2!1sen!2sbd!4v1659596524201!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </div>
@endsection

@section('js')
	<script>
		$(document).ready(function(){
			$('body').on('submit','#contactForm',function(e){
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
			          
			           	sweet(data.message,'success');
			             $("#contactForm")[0].reset();
			             $(".submit_button").text("Success").prop('disabled', false)
 
			             
			       },

			       error:function(response){

			           
			       }

			     });
			});
		})
	</script>
@endsection