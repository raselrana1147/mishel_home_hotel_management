 <section class="customer-area ptb-100">
            <div class="container-fluid p-0">
                <div class="section-title">
                    <span class="pumpkin-color">Our Customer says</span>
                    <h2>Few words from the beloved Guests</h2>
                   
                </div>
                <div class="customer-wrap owl-carousel owl-theme">
                    @foreach ($feed_backs as $feed_back)
                    
                    <div class="single-customer">
                        <img src="{{ asset('assets/frontend/image/default.png')}}" alt="Image">
                        <h3>{{$feed_back->title}}</h3>
                        <p>{{$feed_back->comment}}</p>
                        <span>{{$feed_back->guest_name}}</span>
                       
                    </div>
                       {{-- expr --}}
                   @endforeach
                </div>
            </div>
        </section>