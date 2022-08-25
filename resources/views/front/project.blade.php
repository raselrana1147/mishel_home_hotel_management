@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
	<div class="page-title-area" style="background: url({{banner('city')}});">
		<div class="container">
			<div class="page-title-content">
				<h2>Our Valuable Projects</h2>
				<ul>
					<li>
						<a href="{{ route('front_page') }}">
							Home 
						</a>
					</li>
					<li>Projects</li>
					
				</ul>
			</div>
		</div>
	</div>

	 <section class="our-rooms-area pt-100 pb-70"> 
	            <div class="container">
	                <div class="section-title">
	                    <span>Our Rooms</span>
	                    <h2>Out Projects</h2>
	                </div>
	                <div class="row">
	                    @foreach ($projects as $project)
	                        
	                    <div class="col-lg-4 col-sm-6">
	                        <div class="single-rooms-three-wrap">
	                            <div class="single-rooms-three">
	                               <a href="{{ route('project_detail',$project->id) }}"> <img src="{{ asset('assets/backend/image/project/small/'.$project->image)}}" alt="Image"></a>
	                                <div class="single-rooms-three-content">
	                                    <h3>{{$project->name}}</h3>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    @endforeach
	                </div>
	            </div>
	</section>
@endsection
