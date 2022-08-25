@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Our Special Gallery</h2>
				<ul>
					<li>
						<a href="{{ route('front_page') }}">Home </a>
					</li>
					<li>Gallery</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	<section class="gallery-area ptb-100">
		<div class="container">
			<div class="section-title">
				<span>Gallery</span>
				<h2>Our Specials Memory</h2>
			</div>
			<div class="gallery-wrap">
				<div class="shorting">
					<div class="row">
						@foreach ($galleries as $gallery)
							
						<div class="col-lg-4 col-md-6 mix certified used">
							<div class="single-gallery">
								@if ($gallery->type=='picture')
								<div class="gallery-image" style="background: url({{ asset('assets/backend/image/gallery/small/'.$gallery->image) }});">
								</div>
								@else
								<div class="" style="height: 380px">
									<iframe style="width: 100%;height: 100%" src="{{$gallery->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
								@endif
								<div class="gallery-content">
									
									<h3>
										<a href="room-details-left-sidebar.html">
											{{$gallery->title}}
										</a>
									</h3>
									
								</div>
							</div>
						</div>
		            @endforeach
						
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Service Details Area -->
	
@endsection
