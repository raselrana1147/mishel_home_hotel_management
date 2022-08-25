@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Project Detail</h2>
				<ul>
					<li>
						<a href="{{ route('front_page') }}">
							Home 
						</a>
					</li>
					<li>Project Detail</li>
					
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
								<img src="{{ asset('assets/backend/image/project/original/'.$project->image) }}" alt="Image">
							</div>
							
						</div>
						<h2>{{$project->name}}</h2>
						{!!$project->description!!}

						
					</div>
				</div>
				<div class="col-lg-4">
					<div class="service-sidebar-area">
						
						
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
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
@endsection
@section('js')

@endsection