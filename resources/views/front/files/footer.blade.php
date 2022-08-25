 <footer class="footer-top-area footer-top-area-three jarallax" style="background: url({{banner('footer')}});">
            <div class="container">
                <div class="footer-middle-area pt-100 pb-70">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-widget">
                                <a href="{{ route('front_page') }}">
                                    <img src="{{ logo()}}" alt="Image">
                                </a>
                                <p>{{config('constant.company_email')}} {{config('constant.company_email2')}}<br> {{config('constant.company_phone1')}} <br>{{config('constant.company_phone2')}} <br>
                                    {{config('constant.company_address')}}

                                </p>
                               
                                <ul class="social-icon">
                                    @foreach (socials() as $social)
                                     
                                    <li>
                                        <a href="{{$social->url}}">
                                            {!!$social->icon!!}
                                        </a>
                                    </li>
                                    
                                  @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-widget">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li>
                                        <a href="{{ route('project') }}">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Projects
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('privacy_policy') }}">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Privacy policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gallery') }}">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                             Gallery
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('about_us') }}">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            About Us 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact_us') }}">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Contact 
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-widget">
                                <h3>Services</h3>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Restaurant
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Swimming Pool
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Gym
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Conventional Center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Beauty Parlar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="right-icon bx bx-chevrons-right"></i>
                                            Men's Salon
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-widget">
                                <h3>Newsletter</h3>
                              
                                <form class="newsletter-form" data-toggle="validator">
                                    <input type="email" class="input-tracking" placeholder="Your Email" name="EMAIL" required autocomplete="off">
                
                                    <button class="default-btn" type="submit">
                                        <i class="flaticon-right"></i>
                                    </button>
                
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-area mt-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="copy-right">
                                <p>Copyright @ {{date('Y')}} <a href="index.html">Mishel Homes Limited</a>. All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="designed">
                                <p>Designed By <i class='bx bx-heart'></i> <a href="{{ route('front_page') }}" target="_blank">Mishel Homes limited</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>