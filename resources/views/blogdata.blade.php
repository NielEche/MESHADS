@extends ('layout.base')
    
    @section('content')

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
													{{ $post->title }}
													</h1>
												</div>
											</div>
										</div>
									</div>
									@foreach ($aboutimages as $item)
									<img data-src="/uploads/breadcrumbs/{{ $item->image_name }} " data-retina src="images/blank.png" alt=""/>
									@endforeach
								</li>
							</ul>
						</div>
					</section>
					<!-- Full Width Slider Section -->
                  
				<div class="section-block clearfix">
					<div class="row">

						<!-- Content Inner -->
						<div class="column width-10 offset-1 content-inner blog-regular">
							<div class="row">
								<div class="column width-12">
									<h4 class="vertical-title show-on-mobile mb-30">Blog Post</h4>
								</div>
							</div>
							<div class="post">
								<div class="post-content">
									<div class="row">
										<div class="column width-12">
											<div class="post-info">
												<span class="post-date">{{ $post->created_at->format('d M Y') }}</span> {{-- <span class="post-category">in Work</span> --}}
											</div>
											<h2 class="post-title">{{ $post->caption }}</h2>
										</div>
									</div>
									<div class="thumbnail">
										<img src="/uploads/posts/{{ $post->image_name }}" alt=""/>
									</div>
									<div class="row">
										<div class="column width-11">
												{{ $post->top_content }}
											<blockquote class="large">
												<p>{{ $post->quote }}</p>
												<cite> {{ $post->quote_author }} </cite>
											</blockquote>
										</div>
									</div>
									<div class="row">
										<div class="column width-11">
												{{ $post->middle_content }}

										</div>
									</div>
									@if(!empty ($post->video_url))
									<div class="video-container">
											<iframe src="{{ $post->video_url }}?showinfo=0&amp;loop=1" width="500" height="281"></iframe>
										</div>
										@endif
										
									<div class="row p-t-10">
										<div class="column width-10">
												{{ $post->bottom_content }}
										</div>
									</div>
								</div>
							</div>

							<!-- Post Share -->
							<div id="share" class="post-share post-aux-info">
								<div class="row">
									<div class="column width-12">
										<h4 class="vertical-title show-on-mobile mb-30">Share</h4>
									</div>
								</div>
								<div class="row">
									<div class="column width-12">
										<ul class="social-list list-horizontal large mb-0">
											<li><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + location.href, 'sharer', 'width=626,height=436');" href="javascript: void(0)" class="color-grey color-hover-facebook mb-30 mb-mobile-20"><span class="icon-facebook left"></span> Facebook</a></li>
											<li><a onclick="popUp=window.open('https://twitter.com/share?url=Your-Site-Url', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" class="color-grey color-hover-twitter mb-30 mb-mobile-20"><span class="icon-twitter left"></span> Twitter</a></li>
											<li><a onclick="popUp=window.open('https://plus.google.com/share?url=Your-Site-Url', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript: void(0)" class="color-grey color-hover-google mb-30 mb-mobile-20"><span class="icon-google left"></span> Google+</a></li>
										</ul>
									</div>
								</div>
							</div>

						</div>
						<!-- Content Inner End -->

					</div>
				</div>

				<!-- Pagination Section 2 -->
				<div class="section-block pagination-2 bkg-grey-ultralight">
						<div class="row full-width collapse no-padding">
							<div class="column width-6 prev horizon" data-animate-in="preset:slideInUpShort;duration:200ms;delay:100ms;" data-threshold="1">
								@if ($previous)
									<a href="{{ route('blogdata.details', $previous->slug) }}" class="pagination-previous">
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
									<a href="{{ route('blogdata.details', $next->slug) }}" class="pagination-next">
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