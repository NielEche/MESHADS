@extends ('layout.base')
    
    @section('content')


				<!-- Full Width Slider Section -->
				<section class="section-block featured-media window-height tm-slider-parallax-container">
					<div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-nav-show-on-hover="false" data-scale-under="960" data-speed="1100" data-scale-min-height="300">
						<ul class="tms-slides">
							<li class="tms-slide" data-image data-force-fit data-animation="slide" data-overlay-bkg-color="#000000" data-overlay-bkg-opacity="0.35">
								<div class="tms-content">
									<div class="tms-content-inner left">
										<div class="row">
											<div class="column width-12">
												<h1 class="tms-caption title-large color-white no-transition"
													data-no-scale
												>
													{{ $project->title }}
												</h1>
											</div>
										</div>
									</div>
								</div>
								<img data-src="/uploads/projects/{{ $project->cover_image_name }}" data-retina src="/uploads/projects/{{ $project->cover_image_name }}" alt=""/>
							</li>
						</ul>
					</div>
				</section>
				<!-- Full Width Slider Section End -->

				<!-- Brief Section -->
				<div class="section-block">
					<div class="row">
						<div class="column width-12">
							<h4 class="vertical-title show-on-mobile mb-mobile-50">Brief</h4>
						</div>
					</div>
					<div class="row">
						<div class="column width-7">
							<h2 class="mb-40">{{ $project->caption }}</h2>
							<p>{{ $project->project_brief }}</p>
							{{-- <a href="#" class="button medium bkg-theme bkg-hover-theme color-charcoal color-hover-charcoal mb-mobile-50">Launch Site</a> --}}
						</div>
						<div class="column width-4 offset-1">
							<h5 class="mb-40">Services Provided:</h5>
							<ul class="color-grey">
								@foreach ($project->servicesProvided as $service)
								<li>{{ $service->title }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- Brief Section End -->

				<!-- Parallax Section -->
				@if (! is_null($project->alt_cover_image_name))
				<div class="section-block parallax fixed-height bkg-black" data-src="{{ $project->altCoverImage }}" data-retina></div>
				@endif
				<!-- Parallax Section End -->

				<!-- About Intro -->
				@if (! is_null($project->quote))
					<div class="section-block replicable-content bkg-grey-ultralight">
						<div class="row">
							<div class="column width-6 offset-6 horizon" data-animate-in="preset:slideInUpShort;duration:300ms;">
								<blockquote class="xlarge">
									<p>{{ $project->quote }}</p>
									<cite>- {{ $project->quote_author }}</cite>
								</blockquote>
							</div>
						</div>
					</div>
				@endif
				<!-- About Intro End -->

				<!-- Full Width Images -->
				@foreach ($project->projectImages as $image)

					@if (strtolower($image->tag) === 'print')
						<div class="section-block bkg-white">
							<div class="row">
								<div class="column width-12">
									<h4 class="vertical-title show-on-mobile mb-mobile-50">Print</h4>
								</div>
							</div>
							<div class="row">
								<div class="column width-10 offset-1">
									<div class="thumbnail mb-0 horizon" data-animate-in="preset:slideInLeftShort;duration:300ms;" data-threshold="0.3">
										<img src="{{ $image->projectImage }}" alt=""/>
									</div>
								</div>
							</div>
						</div>
					@endif
					<!--  Full Width Images End -->

					<!--  Full Width Images -->
					@if (strtolower($image->tag) === 'web')
						<div class="section-block pb-80 bkg-grey-ultralight">
							<div class="row">
								<div class="column width-12">
									<h4 class="vertical-title show-on-mobile mb-mobile-50">Web</h4>
								</div>
							</div>
							<div class="row">
								<div class="column width-10 offset-1">
									<div class="thumbnail mb-0 horizon" data-animate-in="preset:slideInRightShort;duration:300ms;" data-threshold="0.3">
										<img src="{{ $image->projectImage }}" alt=""/>
									</div>
								</div>
							</div>
						</div>
					@endif

					@if (strtolower($image->tag) === 'mobile')
						<div class="section-block pb-80 bkg-white">
							<div class="row">
								<div class="column width-12">
									<h4 class="vertical-title show-on-mobile mb-mobile-50">Mobile</h4>
								</div>
							</div>
							<div class="row">
								<div class="column width-12">
									<div class="thumbnail mb-0 horizon" data-animate-in="preset:slideInLeftShort;duration:300ms;" data-threshold="0.2">
										<img src="{{ $image->projectImage }}" alt=""/>
									</div>
								</div>
							</div>
						</div>
					@endif

				@endforeach
				<!--  Full Width Images End -->

				<div>&nbsp;</div>

				<!-- Video Embed -->
				@if (! is_null($project->project_video_url))
				<div class="section-block replicable-content ">
						<div class="row">
							<div class="column width-12">
								<h4 class="vertical-title show-on-mobile mb-mobile-50">Videography</h4>
							</div>
						</div>
						<div class="row">
							<div class="column width-12">
								<div class="video-container horizon" data-animate-in="preset:slideInUpShort;duration:300ms;" data-threshold="0.3">
									<iframe src="{{ $project->project_video_url }}?showinfo=0&amp;loop=1" width="500" height="281"></iframe>
								</div>
							</div>
						</div>
					</div>
					@endif
					<!-- Vimeo Embed End -->

				<!-- Testimonial Slider -->
				@if ($project->projectTestimonials->count() > 0)
					<div class="section-block pt-0">
						<div class="row full-width collapse">
							<div class="column width-12 horizon" data-animate-in="preset:slideInRightShort;duration:300ms;" data-threshold="0.5">
								<div class="tm-slider-container testimonial-slider" data-nav-dark>
									<ul class="tms-slides">
									@foreach ($project->projectTestimonials as $testimonial)	
										<li class="tms-slide" data-image>
											<div class="tms-content-scalable">
												<div class="row full-width no-margins">
													<div class="column width-6 offset-3">
														<blockquote class="medium">
															<p>
																{{ $testimonial->testimonial }}
																<cite>{{ $testimonial->author }}</cite>
															</p>
														</blockquote>
													</div>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>

				@endif
				<!-- Testimonial Slider End -->

				<!-- Share -->
				<div class="section-block replicable-content pt-0">
					<div class="row full-width collapse no-padding">
						<div class="column width-12">
							<hr class="mb-80">
						</div>
					</div>
					<div class="row">
						<div class="column width-12">
							<h4 class="vertical-title show-on-mobile center-on-mobile mb-30">Share</h4>
						</div>
					</div>
					<div class="row">
						<div class="column width-12">
							<ul class="social-list list-horizontal large center mb-0">
								<li><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + location.href, 'sharer', 'width=626,height=436');" href="javascript: void(0)" class="color-grey color-hover-facebook mb-30 mb-mobile-20"><span class="icon-facebook left"></span> Facebook</a></li>
								<li><a onclick="popUp=window.open('https://twitter.com/share?url=Your-Site-Url', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" class="color-grey color-hover-twitter mb-30 mb-mobile-20"><span class="icon-twitter left"></span> Twitter</a></li>
								<li><a onclick="popUp=window.open('https://plus.google.com/share?url=Your-Site-Url', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" class="color-grey color-hover-google mb-30 mb-mobile-20"><span class="icon-google left"></span> Google+</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Share End -->

				<!-- Pagination Section 2 -->
				<div class="section-block pagination-2 bkg-grey-ultralight">
					<div class="row full-width collapse no-padding">
						<div class="column width-6 prev horizon" data-animate-in="preset:slideInUpShort;duration:200ms;delay:100ms;" data-threshold="1">
							@if ($previous)
								<a href="{{ route('works.show', $previous->slug) }}" class="pagination-previous">
									<span class="indication-large">Prev</span>
									<span class="icon-left-open-mini left"></span>
									<small>Previous</small>
									<span>{{ $previous->title }}</span>
								</a>
							@else
								<div class="col-sm-6">&nbsp;</div>
							@endif
						</div>
						<div class="column width-6 next horizon" data-animate-in="preset:slideInUpShort;duration:200ms;delay:200ms;" data-threshold="1">
							@if ($next)
								<a href="{{ route('works.show', $next->slug) }}" class="pagination-next">
									<span class="indication-large">Next</span>
									<span class="icon-right-open-mini right"></span>
									<small>Next</small>
									<span>{{ $next->title }}</span>
								</a>
							@else
								<div class="col-sm-6">&nbsp;</div>
							@endif
						</div>
					</div>
				</div>
				<!-- Pagination Section 2 -->


@endsection