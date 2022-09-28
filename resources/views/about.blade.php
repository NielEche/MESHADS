@extends ('layout.base')

@section('content')

@foreach ($aboutimages as $item)
<!-- Full Width Slider Section -->
<section class="section-block featured-media tm-slider-parallax-container">
    <div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-nav-show-on-hover="false"
        data-scale-under="960" data-speed="1100" data-scale-min-height="400">
        <ul class="tms-slides">
            <li class="tms-slide" data-image data-force-fit data-animation="slide" data-overlay-bkg-color="#000000"
                data-overlay-bkg-opacity="0.45">
                <div class="tms-content">
                    <div class="tms-content-inner left">
                        <div class="row">
                            <div class="column width-12">
                                <h1 class="tms-caption title-large color-white no-transition" data-no-scale>
                                    {{ $item->title }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <img data-src="/uploads/breadcrumbs/{{ $item->image_name }} " data-retina src="images/blank.png"
                    alt="" />
            </li>
        </ul>
    </div>
</section>
<!-- Full Width Slider Section End -->
@endforeach

<!-- Content -->
<div class="section-block pb-0">
    <div class="row">
        <div class="column width-12">
            <h4 class="vertical-title mb-mobile-50">The Concept</h4>
        </div>
    </div>
    <div class="row flex">
        <div class="column width-6">
            <h2>About Mesh Advertising and Design Studios</h2>
        </div>
        <div class="column width-6">
            <p>
                @if ($about)
                {!! $about->brief !!}
                @endif
                {{-- MADS is a design agency. We transform businesses at scale by creating systems of brand, product and service that deliver a distinctly better experience. We offer brand consultancy, design and strategy across all market sectors. We’ll shape your identity to compelling effect, and show you how to apply your personality in any format - from print to electronic with everything in between - for maximum results. These days, branding is not only somewhat more sophisticated, but also more crucial to a company’s success. Consistent use of your logo, colour, typeface and visual style is critical to performing at the highest level, Maintaining customer and employee loyalty and delivering success. --}}
               
            </p>
        </div>
    </div>
</div>
<!-- Content End -->

<!-- Image Grid -->
<div class="section-block grid-container fade-in-progressively" data-layout-mode="masonry" data-grid-ratio="1"
    data-animate-filter-duration="1000" data-set-dimensions data-animate-resize data-animate-resize-duration="700">
    <div class="row">
        <div class="column width-12">
            <div class="row grid content-grid-2">
                <div class="grid-item grid-sizer">
                    <div class="thumbnail horizon" data-animate-in="preset:slideInUpShort;duration:300ms;"
                        data-threshold="0.2">
                        <img src="/uploads/about-page/{{ $about->primary_img_name }}" alt="" />
                    </div>
                </div>
                <div class="grid-item">
                    <div class="thumbnail horizon" data-animate-in="preset:slideInUpShort;duration:300ms;delay:100ms;"
                        data-threshold="0.2">
                        <img src="/uploads/about-page/{{ $about->secondary_img_name }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Image Grid End -->

<!-- Content -->
<div class="section-block pt-0 pb-0">
    <div class="row">
        <div class="column width-10 offset-1">
            <blockquote class="xlarge">
                <p>
                    {{ $about->quote }}
                </p>
                <cite>- {{ $about->quote_author }}
                </cite>
            </blockquote>
        </div>
    </div>
</div>
<!-- Content End -->

<!-- Team Grid -->
<div class="section-block team-2 pt-60">
    <div class="row">
        <div class="column width-12">
            <h4 class="vertical-title mb-mobile-50">The Creatives</h4>
        </div>
    </div>
    <div class="row">
        <div class="column width-12">
            <div class="row content-grid-3 masonryContainer">

                @forelse($teams as $team)
                <div class="grid-item grid-sizer item">
                    <div class="thumbnail no-margin-bottom" data-hover-easing="easeInOut" data-hover-speed="500"
                        data-hover-bkg-color="#ffffff" data-hover-bkg-opacity="0.9">
                        <img src="{{ $team->avatar }}" width="760" height="760" alt="" />
                        <div class="caption-over-outer">
                            <div class="caption-over-inner v-align-bottom color-charcoal">
                                <h4>{{ $team->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="team-content-info background-none mb-mobile-50">
                        <h6 class="occupation">{{ $team->job_title }}</h6>
                        <p>{{ $team->bio }}</p>
                        <ul class="social-list list-horizontal">
                            @if(!empty ($team->facebook))
                            <li><a href="{{ $team->facebook }}" target="_blank"><span
                                        class="icon-facebook small"></span></a></li>
                            @endif

                            @if(!empty ($team->twitter))
                            <li><a href="{{ $team->twitter }}" target="_blank"><span
                                        class="icon-twitter small"></span></a></li>
                            @endif

                            @if(!empty ($team->github))
                            <li><a href="{{ $team->github }}" target="_blank"><span
                                        class="icon-github small"></span></a></li>
                            @endif

                        </ul>
                    </div>
                </div>
                @empty
                No team yet.
                @endforelse

            </div>
        </div>
    </div>
</div>
<!-- Team Grid End -->

<!-- Recent Posts -->
@include('partials.recent_posts')
<!-- Recent Posts End -->

<!-- Subscribe Modal Simple -->
<div id="subscribe-modal" class="pt-70 pb-50 hide ">
    <div class="row">
        <div class="column width-12 center">

            <!-- Info -->
            <h3 class="mb-10">Get Our Latest News</h3>
            <p class="mb-30">We only use your email for sending you offers</p>
            <!-- Info End -->

            <!-- Signup -->
            <div class="signup-form-container">
                <form class="signup-form merged-form-elements" action="php/subscribe.php" method="post" novalidate>
                    <div class="row">
                        <div class="column width-8">
                            <div class="field-wrapper">
                                <input type="email" name="email" class="form-email form-element large left"
                                    placeholder="Email address*" tabindex="2" required>
                            </div>
                        </div>
                        <div class="column width-4">
                            <input type="submit" value="Subscribe"
                                class="form-submit button large bkg-theme bkg-hover-theme color-white color-hover-white">
                        </div>
                    </div>
                    <input type="text" name="honeypot" class="form-honeypot form-element">
                </form>
                <div class="form-response show"></div>
            </div>
            <!-- Signup End -->

        </div>
    </div>
</div>
<!-- Subscribe Modal Simple -->

</div>
<!-- Content End -->


<!-- Logo 4 Section -->
<div class="section-block logos-3 bkg-white">
    <div class="row">
        <div class="column width-12">
            <h4 class="vertical-title show-on-mobile mb-mobile-50">Recent Clients</h4>
        </div>
    </div>
    <div class="row">
        <div class="column width-12">
            <div class="row content-grid-4 masonryContainer">

                @foreach ($clients as $client)
                <div class="grid-item grid-sizer item">
                    <a href="{{ $client->website }}" class="horizon" data-animate-in="preset:scaleIn;duration:300ms;"
                        target="_blank">
                        <img src="{{ $client->logo }}" alt="" />
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Logo 4 Section End -->

@endsection

@section("javascript")
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>

<script type="text/javascript">
    $(function () {

        var masonryContainer = $(".masonryContainer");

        masonryContainer.imagesLoaded(function () {
            masonryContainer.masonry({
                itemSelector: ".item",
            });
        });

    });

</script>


@stop
