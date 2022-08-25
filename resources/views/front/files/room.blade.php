 <section class="our-rooms-area pt-100 pb-70"> 
            <div class="container">
                <div class="section-title">
                    <span>Our Rooms</span>
                    <h2>Fascinating rooms & suites</h2>
                </div>
                <div class="row">
                    @foreach ($rooms as $room)
                        
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-rooms-three-wrap">
                            <div class="single-rooms-three">
                               <a href="{{ route('room_detail',$room->slug) }}"> <img src="{{ asset('assets/backend/image/room/small/'.$room->image)}}" alt="Image"></a>
                                <div class="single-rooms-three-content">
                                    <h3>{{$room->title}}</h3>
                                    <ul class="rating">
                                        @for ($i = 0; $i <max_ratting($room->id) ; $i++)
                                           <li>
                                               <i class="bx bxs-star"></i>
                                           </li>
                                        @endfor
                                        
                                      
                                    </ul>
                                    <span class="price">Cost {{price_format($room->room_type->price)}}/night</span>
                                    <a href="{{ route('room_booking',$room->slug) }}" class="default-btn">
                                        Book Online
                                        <i class="flaticon-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
</section>