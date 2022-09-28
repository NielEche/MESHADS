@extends ('layout.base')
    
    @section('content')

			@foreach ($aboutimages as $item)
				<!-- Full Width Slider Section -->
				<section class="section-block featured-media tm-slider-parallax-container">
					<div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-nav-show-on-hover="false" data-scale-under="960" data-speed="1100" data-scale-min-height="400">
						<ul class="tms-slides">
							<li class="tms-slide" data-image data-force-fit data-animation="slide" data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.45">
								<div class="tms-content">
									<div class="tms-content-inner left">
										<div class="row">
											<div class="column width-12">
												<h1 class="tms-caption title-large color-white no-transition"
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

				<!-- Portfolio Grid -->
				@include('partials.allprojects')
				<!-- Portfolio Grid End -->

				<!-- Recent Posts -->
                @include('partials.recent_posts')
                <!-- Recent Posts End -->


@endsection