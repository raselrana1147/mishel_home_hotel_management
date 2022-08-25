
  <div class="eorik-nav-style eorik-nav-style-three fixed-top">
            <div class="navbar-area">
                <!-- Menu For Mobile Device -->
                <div class="mobile-nav">
                    <a href="{{ route('front_page') }}" class="logo">
                        <img src="{{ asset('assets/backend/image/common/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <!-- Menu For Desktop Device -->
                <div class="main-nav">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="container">
                            <a class="navbar-brand" href="{{ route('front_page') }}">
                                <img src="{{ asset('assets/backend/image/common/logo.png')}}" alt="Logo">
                            </a>
                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('front_page') }}" class="nav-link dropdown-toggle active">
                                            Home
                                        </a>
                                      
                                    </li>
                                       <li class="nav-item">
                                        <a href="{{ route('front_page') }}" class="nav-link dropdown-toggle active">
                                            Room Type
                                            <i class='bx bx-chevron-down'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach (room_types() as $room_type)
                                               
                                            <li class="nav-item">
                                                <a href="{{ route('type_wise_room',$room_type->id) }}" class="nav-link">{{$room_type->name}}</a>
                                            </li>
                                           @endforeach
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('gallery') }}" class="nav-link dropdown-toggle active">
                                            Gallery
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a href="{{ route('project') }}" class="nav-link dropdown-toggle active">
                                            Our Projects
                                        </a>
                                    </li>
                                    <li class="nav-item logo-three hide-logo">
                                        <a href="{{ route('front_page') }}">
                                            <img src="{{ asset('assets/backend/image/common/logo.png')}}" alt="Logo">
                                        </a>
                                    </li>
                                    
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('about_us') }}" class="nav-link dropdown-toggle">
                                            About Us
                                        </a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contact_us') }}" class="nav-link dropdown-toggle">
                                            Contacts
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('feedback') }}" class="nav-link dropdown-toggle">
                                            Feedback
                                        </a>
                                    </li>
                                    </li>
                                       <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link dropdown-toggle active">
                                            Account
                                            <i class='bx bx-chevron-down'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @auth
                                               
                                                <li class="nav-item">
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <a class="nav-link" :href="route('admin_logout')"
                                                                onclick="event.preventDefault();
                                                                            this.closest('form').submit();" style="cursor: pointer;">
                                                           Sign Out
                                                        </a>
                                                    </form>
                                                </li>
                                            @else
                                                <li class="nav-item">
                                                    <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('login') }}" class="nav-link">Sign UP</a>
                                                </li>
                                            @endauth
                                            
                                           
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>