@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
 <div class="page-title-area" style="background: url({{banner('city')}});">
 	<div class="container">
 		<div class="page-title-content">
 			<h2>About Us</h2>
 			<ul>
 				<li>
 					<a href="{{ route('front_page') }}">
 						Home 
 					</a>
 				</li>
 				<li>About us</li>
 				
 			</ul>
 		</div>
 	</div>
 </div>

 <section class="explore-area ptb-100">
 	<div class="container">
 		<div class="section-title">
 			<span>Explore</span>
 			<h2>We are cool to give you pleasure</h2>
 		</div>
 		<div class="row align-items-center">
 			<div class="col-lg-6">
 				<div class="explore-img">
 					<img src="{{banner('contact_one')}}" alt="Image">
 				</div>
 			</div>
 			<div class="col-lg-6">
 				<div class="explore-content ml-30">
 					<h2>As much as comfort want to get from us everything</h2>
 					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eveniet reprehenderit ratione ad perspiciatis repudiandae iste ipsam temporibus sit quo! Incidunt, necessitatibus fugiat ut dignissimos pariatur odit natus ipsum! Obcaecati iste ipsam temporibus sit quo! Incidunt, necessitatibus Obcaecati iste ipsam temporibus.</p>

 					<p>Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nim ad minim veniam, quis nostrud exercitation. dolor sit amet, consectetur adipisicing quis nostrud exercitation.</p>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Explore Area -->

 <!-- Start Our Rooms Area -->
 <section class="our-rooms-area pb-100">
 	<div class="container">
 		<div class="section-title">
 			<span>Our Rooms</span>
 			<h2>Fascinating rooms & suites</h2>
 		</div>
 		<div class="tab industries-list-tab">
 			<div class="row">
 				<div class="col-lg-4">
 					<ul class="tabs">
 						@foreach (rooms() as $room)
 						
 						<li class="single-rooms">
 							<img src="{{ asset('assets/backend/image/room/small/'.$room->image) }}" alt="Image">
 							<div class="room-content">
 								<h3>{{$room->title}}</h3>
 								<span>From {{price_format($room->room_type->price,2)}}/night</span>
 							</div>
 						</li>
 						
 						@endforeach
 					</ul>
 				</div>
 				<div class="col-lg-8">
 					<div class="tab_content">
 						@foreach (rooms() as $room)
 						<div class="tabs_item">
 							<div class="our-rooms-single-img room-bg-1" style="background: url({{asset('assets/backend/image/room/large/'.$room->image)}});">
 							</div>
 							<span class="preview-item">{{$room->title}}</span>
 						</div>
 						@endforeach
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Our Rooms Area -->

 <!-- Start City View Area -->
 <section class="city-view-area ptb-100" style="background: url({{banner('footer')}});">
 	<div class="container">
 		<div class="city-wrap">
 			<div class="single-city-item owl-carousel owl-theme">
 				<div class="city-view-single-item">
 					<div class="city-content">
 						<span>The City View</span>
 						<h3>A charming view of the city town</h3>
 						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur necessitatibus fugit eligendi accusantium vel quos debitis cupiditate ducimus placeat explicabo distinctio, consectetur eos animi, a voluptate delectus. Id, explicabo saepe Consequuntur</p>
 
 						<p>The view onin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ad minim veniam, quis nostrud exercitation consectetur.</p>
 					</div>
 				</div>
 				<div class="city-view-single-item">
 					<div class="city-content">
 						<span>The City View</span>
 						<h3>The charming view of the city</h3>
 						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur necessitatibus fugit eligendi accusantium vel quos debitis cupiditate ducimus placeat explicabo distinctio, consectetur eos animi, a voluptate delectus. Id, explicabo saepe Consequuntur</p>
 
 						<p>The view onin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ad minim veniam, quis nostrud exercitation consectetur.</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End City View Area -->

 <!-- Start Counter Area -->
 <section class="counter-area pt-100 pb-70 jarallax">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-counter">
 					<p>Amentities</p>
 					<h2>
 						<span class="odometer" data-count="{{total_data('amenities')}}">00</span> <span class="target">+</span>
 					</h2>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-counter">
 					<p>Room Types</p>
 					<h2>
 						<span class="odometer" data-count="{{total_data('room_types')}}">00</span> <span class="target">+</span>
 					</h2>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-counter">
 					<p>Rooms</p>
 					<h2>
 						<span class="odometer" data-count="{{total_data('rooms')}}">00</span> <span class="target">+</span>
 					</h2>
 				</div>
 			</div>
 			<div class="col-lg-3 col-sm-6">
 				<div class="single-counter">
 					<p>Services</p>
 					<h2>
 						<span class="odometer" data-count="{{total_data('restaurants')}}">00</span> <span class="target"></span>
 					</h2>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End Counter Area -->

 <!-- start Testimonials Area -->
 <section class="testimonials-area ptb-100">
 	<div class="container">
 		<div class="section-title">
 			<span>Testimonials</span>
 			<h2>What customers say</h2>
 		</div>
 		<div class="testimonials-wrap owl-carousel owl-theme">

 			@foreach ($feed_backs as $feed_back)
 			
 			<div class="single-testimonials">
 				
 				<h3>{{$feed_back->title}}</h3>
 				<p>“{{$feed_back->comment}}”</p>
 				<div class="testimonials-content">
 					<img src="{{ asset('assets/frontend/image/default.png')}}" alt="Image">
 					<h4>{{$feed_back->guest_name}}</h4>
 					
 				</div>
 			</div>
 				{{-- expr --}}
 			@endforeach
 		
 		</div>
 	</div>
 </section>

@endsection