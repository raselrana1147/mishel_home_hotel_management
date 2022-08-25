<div class="slider-gallery-area">
    <div class="container-fluid p-0">
        <div class="slider-gallery-wrap owl-carousel owl-theme">
            @foreach (galleries() as $gallery)
            <div class="single-slider-gallery">
                <img src="{{ asset('assets/backend/image/gallery/small/'.$gallery->image)}}" alt="Image">
                <div class="instagram-link">
                    <a href="#">
                        <i class="bx bxl-instagram"></i>
                    </a>
                </div>
            </div>
         @endforeach
        </div>
    </div>
 </div>