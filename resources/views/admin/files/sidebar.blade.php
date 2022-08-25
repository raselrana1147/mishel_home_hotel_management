<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Main Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            
            <li class="">
                <a href="{{ route('booking.index') }}">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Bookings</span>
                </a>
            </li>
            
        </ul>
        <div class="pcoded-navigatio-lavel">UI Element</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu {{Route::is('amenity.index','amenity.create','amenity.edit','room_type.index','room_type.create','room_type.edit') ? 'pcoded-trigger' : ''}}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Rooms Components</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{Route::is('amenity.index','amenity.create','amenity.edit')  ? 'active' : ''}}">
                        <a href="{{ route('amenity.index') }}">
                            <span class="pcoded-mtext">Amenities</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('room_type.index') }}">
                            <span class="pcoded-mtext">Room Type</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('room.index') }}">
                            <span class="pcoded-mtext">Room</span>
                        </a>
                    </li>
                </ul>
            </li>
          
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Hall Rooms</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="#">
                            <span class="pcoded-mtext">Semilar Room</span>
                        </a>
                    </li>

                </ul>
            </li>
          
        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Seminer Rooms</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="#">
                            <span class="pcoded-mtext">Semilar Room</span>
                        </a>
                    </li>

                </ul>
            </li>
          
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Our Services</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('restaurant.index') }}">
                            <span class="pcoded-mtext">Restaurant</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="">
                            <span class="pcoded-mtext">Conventional</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="">
                            <span class="pcoded-mtext">Gym</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="">
                            <span class="pcoded-mtext">Salon</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="">
                            <span class="pcoded-mtext">Beauty Parlar</span>
                        </a>
                    </li><li class=" ">
                        <a href="">
                            <span class="pcoded-mtext">Food order</span>
                        </a>
                    </li>

                </ul>
            </li>
          
        </ul>
      
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">General Components</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('slider.index') }}">
                            <span class="pcoded-mtext">Sliders</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('floor.index') }}">
                            <span class="pcoded-mtext">Floors</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('room_keeper.index') }}">
                            <span class="pcoded-mtext">Room Keeper</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('gallery.index') }}">
                            <span class="pcoded-mtext">Gallery</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="#">
                            <span class="pcoded-mtext">Setting</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('banner.index') }}">
                            <span class="pcoded-mtext">Banner</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('project.index') }}">
                            <span class="pcoded-mtext">Project</span>
                        </a>
                    </li>
                </ul>
            </li>

             <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Review and Feedback</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('review.list') }}">
                            <span class="pcoded-mtext">Review</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('feedback.list') }}">
                            <span class="pcoded-mtext">Feedback</span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('admin.contact') }}">
                            <span class="pcoded-mtext">Contact</span>
                        </a>
                    </li>
                  
                </ul>
            </li>


             <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icofont icofont-ui-settings"></i></span>
                    <span class="pcoded-mtext">Setting</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('social_list') }}">
                            <span class="pcoded-mtext">Social page</span>
                        </a>
                    </li>
                </ul>
            </li>
          
        </ul>
       
    </div>
</nav>