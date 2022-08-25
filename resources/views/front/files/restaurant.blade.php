<div class="restaurant-item">
            <div class="container-fluid">
                <div class="row">
                    
                    @foreach ($restaurants as $key=> $restaurant)
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            
                            <div class="col-lg-6 content img p-0">
                                <div class="restaurant-img bg-1 jarallax" style="background-image: url({{ asset('assets/backend/image/restaurant/small/'.$restaurant->image) }})">
                                </div>
                            </div>
                            <div class="col-lg-6 p-0">
                                <div class="single-restaurants">
                                    <i class="restaurants-icon flaticon-coffee-cup"></i>
                                    <span>{{$restaurant->title}}</span>
                                    <p>{!! $restaurant->description !!}</p>
                                    <a href="#" class="default-btn">
                                        Explore More
                                        <i class="flaticon-right"></i> 
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    {{-- expr --}}
                    @endforeach
                 
                   
                    
                </div>
            </div>
        </div>