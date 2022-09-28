@extends ('layout.base')
    
    @section('content')

                <!-- Fullscreen Slider Section -->
                <section class="section-block featured-media window-height tm-slider-parallax-container">
                    <div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-scale-under="960" data-speed="1100" data-scale-min-height="500">

                        <ul class="tms-slides">
                            @foreach ($sliders as $slider)

                            @if ($slider->type == 'video')
							<li class="tms-slide" data-video data-video-bkg-vimeo data-pause-on-scroll data-animation="slideTopBottom" data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.1">
                                    <img data-src="images/slider/slide-1-fs.jpg" data-retina src="images/blank.png" alt=""/>
                                    <iframe width="2500" height="1600" src="{{ $slider->link_text }}?api=1"></iframe>
                                </li>

                                @endif

                                @if ($slider->type == 'image')
                                    <li class="tms-slide" data-image data-force-fit data-animation="scaleIn" data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.35">
                                        <div class="tms-content">
                                            <div class="tms-content-inner left">
                                                <div class="row">
                                                    <div class="column width-7">
                                                        <h1 class="title-large color-white mb-30">
                                                            <span class="tms-caption" data-animate-in="preset:slideInUpShort;duration:1000ms;" data-no-scale>{{ $slider->title }}</span>
                                                        </h1>
                                                    </div>
                                                    <div class="column width-7">
                                                        <p class="tms-caption text-medium weight-regular color-white mb-30"
                                                            data-animate-in="preset:slideInUpShort;duration:1000ms;delay:200ms;"
                                                            data-no-scale
                                                        >
                                                            {{ $slider->caption }}
                                                        </p> 
                                                        <br>
                                                        <div class="tms-caption"
                                                            data-animate-in="preset:slideInUpShort;duration:1000ms;delay:400ms;"
                                                            data-x="center"
                                                            data-y="bottom"
                                                            data-offsety="50"
                                                        >
                                                            @if ($slider->link_url)
                                                                <a href="{{ $slider->link_url }}" data-offset="-260" class="scroll-link text-small weight-bold color-white" data-offset="-60">See Work</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img data-src="{{ $slider->file }}" data-retina src="{{ $slider->file }}" alt=""/>
                                    </li>
                                @endif

                            @endforeach

                        </ul>
                        
                    </div>
                </section>
                <!-- Fullscreen Slider Section End -->

                <!-- Portfolio Grid -->
                @include('partials.projects')
                <!-- Portfolio Grid End -->

                <!-- Recent Posts -->
                @include('partials.recent_posts')
                <!-- Recent Posts End -->

@endsection