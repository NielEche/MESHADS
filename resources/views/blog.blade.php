@extends ('layout.base')
    
    @section('content')

    @foreach ($aboutimages as $item)
                <!-- Full Width Slider Section -->
                <section class="section-block featured-media page-intro tm-slider-parallax-container">
                    <div class="tm-slider-container full-width-slider" data-parallax data-parallax-fade-out data-animation="slide" data-scale-under="1140">
                        <ul class="tms-slides">
                            <li class="tms-slide" data-image data-force-fit data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.35">
                                <div class="tms-content">
                                    <div class="tms-content-inner left">
                                        <div class="row">
                                            <div class="column width-12">
                                                <h1 class="tms-caption title-large color-white mb-10"
                                                    data-animate-in="preset:scaleOut;duration:1000ms;"
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
                <!-- Full Width Slider Section -->
        @endforeach

                <!-- Content Inner -->
                <div class="section-block grid-filter-menu right left-on-mobile" data-target-grid="#recent-posts">
                    <div class="row">
                        {{-- <div class="column width-12">
                            <ul>
                                <li>Categories:</li>
                                <li><a class="active scroll-link" href="#recent-posts" data-offset="-120" data-filter="*">All <sup class="project-count"></sup></a></li>
                                <li><a class="scroll-link" href="#recent-posts" data-offset="-120" data-filter=".culture">Culture <sup class="project-count"></sup></a></li>
                                <li><a class="scroll-link" href="#recent-posts" data-offset="-120" data-filter=".work">Work <sup class="project-count"></sup></a></li>
                                <li><a class="scroll-link" href="#recent-posts" data-offset="-120" data-filter=".general">General <sup class="project-count"></sup></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="section-block content-inner pt-0">
                    <div id="recent-posts" class="blog-masonry grid-container no-margins fade-in-progressively" data-layout-mode="masonry" data-grid-ratio="1" data-animate-resize data-animate-resize-duration="700">
                        <div class="row">
                            <div class="column width-12">
                                <h4 class="vertical-title mb-mobile-50">MeshAds News</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column width-12">
                                <div class="row grid content-grid-3 clearfix">

                            @foreach ($posts as $post)
                                    <div class="grid-item work grid-sizer">
                                        <div class="post">
                                            <div class="post-content">
                                                <div class="post-media">
                                                    <div class="thumbnail overlay-fade-out img-scale-in" data-animate-in="preset:slideInLeftShort;duration:300ms;" data-threshold="0.2" data-hover-easing="easeInOutCirc" data-hover-speed="500" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.2">
                                                        <a class="overlay-link img-cover" href="{{ route('blogdata.details',['post' => $post->slug] ) }}">
                                                            <img src="/uploads/posts/{{ $post->image_name }}" alt=""/>
                                                            <span class="overlay-info left v-align-top">
                                                                <span>
                                                                    <span>
                                                                        <span class="separator"></span>
                                                                        <span class="post-title">{{ $post->title }}</span>
                                                                        <span class="post-info">
                                                                            <span class="post-date">{{ $post->created_at->format('d M Y') }}</span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Inner End -->

                <!-- Pagination Section 2 -->
                {{-- <div class="section-block pagination-2 bkg-grey-ultralight">
                    <div class="row full-width collapse no-padding">
                        <div class="column width-6 prev horizon" data-animate-in="preset:slideInUpShort;duration:200ms;delay:100ms;" data-threshold="1">
                            <a href="#" class="pagination-previous">
                                <span class="indication-large">Prev</span>
                                <span class="icon-left-open-mini left"></span>
                                <small>Previous</small>
                                <span>4 More Posts</span>
                            </a>
                        </div>
                        <div class="column width-6 next horizon" data-animate-in="preset:slideInUpShort;duration:200ms;delay:200ms;" data-threshold="1">
                            <a href="#" class="pagination-next disabled">
                                <span class="indication-large">Next</span>
                                <span class="icon-right-open-mini right"></span>
                                <small>Next</small>
                                <span>No More Posts</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <!-- Pagination Section 2 -->


@endsection