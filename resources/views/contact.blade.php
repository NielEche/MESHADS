@extends ('layout.base')
    
    @section('content')

    @foreach ($aboutimages as $item)
                <!-- Full Width Slider Section -->
                <section class="section-block featured-media page-intro small tm-slider-parallax-container">
                    <div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-nav-show-on-hover="false" data-scale-under="960" data-speed="1100" data-scale-min-height="400">
                        <ul class="tms-slides">
                            <li class="tms-slide" data-image data-force-fit data-animation="slide" data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.45">
                                <div class="tms-content">
                                    <div class="tms-content-inner left">
                                        <div class="row">
                                            <div class="column width-12">
                                                <h1 class="tms-caption title-large color-white"
                                                    data-no-scale
                                                >
                                                {{ $item->title }} 
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img data-src="/uploads/breadcrumbs/{{ $item->image_name }} " data-retina src="images/blank.png" alt=""/>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- Full Width Slider Section End -->
            @endforeach

                <!-- Hero 5 Section -->
                <div class="section-block hero-5 clear-height right bkg-grey-ultralight show-media-column-on-mobile">
                    <h4 class="vertical-title mb-mobile-50">Visit Us</h4>
                    <div class="media-column background-none width-6 center horizon" data-animate-in="preset:slideInUpShort;duration:1000ms;" data-threshold="0.3">
                        <div class="map-container" data-coordinates="[[40.723301,-74.002988]]" data-icon='"images/assets/map-marker.png"' data-info='"Downtown New York Office<br>44 St. West 32"' data-zoom-level="16" data-style="greyscale">
                            <div class="map-canvas" id="map-canvas-1"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column width-7">
                            <div class="hero-content split-hero-content">
                                <div class="hero-content-inner left">
                                    <p class="lead mb-50">{{ $contacts->header }}</p>
                                    <p> {{ $contacts->brief }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero 5 Section End -->

                <!-- Contact Form -->
                {{-- <div class="section-block replicable-content contact-2">
                    <div class="row">
                        <div class="column width-12">
                            <h4 class="vertical-title show-on-mobile mb-mobile-50">Message Us</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column width-8 left">
                            <div class="contact-form-container pu-10">
                                <form class="contact-form" action="{{route('mail.contact')}}" method="post" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="column width-6">
                                            <input type="text" name="fname" class="form-fname form-element large" placeholder="First Name*" tabindex="1" required>
                                        </div>
                                        <div class="column width-6">
                                            <input type="text" name="lname" class="form-lname form-element large" placeholder="Last Name" tabindex="2">
                                        </div>
                                        <div class="column width-6">
                                            <input type="email" name="email" class="form-email form-element large" placeholder="Email address*" tabindex="3" required>
                                        </div>
                                        <div class="column width-6">
                                            <input type="text" name="website" class="form-website form-element large" placeholder="Website" tabindex="4">
                                        </div>

                                        <div class="column width-12">
                                            <div class="form-select form-element large">
                                                <select name="find-us" class="form-aux" data-label="Options" tabindex="5">
                                                    <option selected="selected" value="">How'd You Hear About Us</option>
                                                    <option value="">From a friend</option>
                                                    <option value="">Found Balzac online</option>
                                                    <option value="">Previous client</option>
                                                    <option value="">Through advertising</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="column width-6">
                                            <input type="text" name="honeypot" class="form-honeypot form-element large">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column width-12">
                                            <textarea name="message" class="form-message form-element large" placeholder="Message*" tabindex="6" required></textarea>
                                        </div>

                                        <div class="column width-12">
                                            <input type="submit" value="Send Email" class="form-submit button large bkg-theme bkg-hover-theme color-charcoal color-hover-white">
                                        </div>
                                    </div>
                                </form>
                                <div class="form-response center"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--Contact Form End -->


@endsection