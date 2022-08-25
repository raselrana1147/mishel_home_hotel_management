 <section class="eorik-slider-area eorik-slider-area-three">
            <div class="eorik-slider-three owl-carousel owl-theme">
                @foreach ($sliders as $slider)
                <div class="eorik-slider-item slider-item-bg-7"  style="background-image: url({{ asset('assets/backend/image/slider/medium/'.$slider->image) }})">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="eorik-slider-text overflow-hidden one">
                                    @if (!is_null($slider->title_1))
                                       <h1>{{$slider->title_1}}</h1>
                                    @endif
                                    @if (!is_null($slider->title_2))
                                      <span>{{$slider->title_2}}</span>
                                    @endif
                                    @if (!is_null($slider->button_title))
                                    <div class="slider-btn">
                                        @if (!is_null($slider->url))
                                           <a class="default-btn" href="{{$slider->url}}">
                                               {{$slider->button_title}}
                                               <i class="flaticon-right"></i>
                                           </a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
            <div class="social-link">
                <ul>
                    <li class="follow">
                        Follow on
                    </li>
                    @foreach (socials() as $social)
                    <li>
                        <a href="{{$social->url}}">
                            {!!$social->icon!!}
                        </a>
                    </li>
                  @endforeach
                </ul>
            </div>
        </section>