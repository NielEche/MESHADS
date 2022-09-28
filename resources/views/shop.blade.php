@extends ('layout.base')
    
    @section('content')

				<!-- Intro Title -->
				@foreach ($aboutimages as $item)
				<div class="section-block intro-title-1 clear-height pt-150">
					<div class="row">
						<div class="column width-12">
							<div class="title-container">
								<div class="title-container-inner">
									<h2 class="title-large mb-30"> {{ $item->title }} </h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- Intro Title End -->

				<!-- Divider -->
				<div class="section-block pt-0 pb-0">
					<div class="row">
						<div class="column width-12">
							<hr class="thick no-margins">
						</div>
					</div>
				</div>
				<!-- Divider End -->

				<!-- Filter -->
				<div class="section-block grid-filter-options grid-filter-menu pb-50">
					<div class="row">
						{{-- <div class="column width-12">
							<div class="grid-filter-options-inner">
								<div class="row">
									<div class="column width-3 left">
										<div class="product-result-count">
											<p>Product Categories:</p>
										</div>
									</div>
									<div class="column width-9 right left-on-mobile">
										<ul>
											<li><a class="active scroll-link" href="#product-grid" data-offset="-240" data-filter="*">All Products <sup class="project-count"></sup></a></li>
											<li><a class="scroll-link" href="#product-grid" data-offset="-240" data-filter=".print">Print <sup class="project-count"></sup></a></li>
											<li><a class="scroll-link" href="#product-grid" data-offset="-240" data-filter=".clothing">Clothing <sup class="project-count"></sup></a></li>
											<li><a class="scroll-link" href="#product-grid" data-offset="-240" data-filter=".packaging">Packaging <sup class="project-count"></sup></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
				<!-- Filter End -->

				<!-- Product Grid -->
				<div id="product-grid" class="section-block grid-container products fade-in-progressively no-padding-top" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="700">
					<div class="row">
						<div class="column width-12">
							<h4 class="vertical-title mb-mobile-50">Showing <strong>active</strong> products </h4>
						</div>
					</div>
					<div class="row">
						<div class="column width-12">
							<div class="row grid content-grid-3">

							@forelse($shops as $shop)
								<div class="grid-item product grid-sizer">
									<div class="thumbnail product-thumbnail img-scale-in horizon" data-animate-in="preset:slideInLeftShort;duration:300ms;" 
									data-threshold="0.2" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.5">
										
									<span class="onsale">Sale</span>

										<a class="overlay-link lightbox-link" data-group="product-lightbox-gallery" href="{{ $shop->file }}">
											<img src="{{ $shop->file }}" alt=""/>
										</a>
										<ul class="product-actions">
											<li><a href="{{ $shop->url }}" class="button add-to-cart-button small"><span class="icon-shopping-cart no-margins"></span></a></li>
										</ul>
									</div>
									<div class="product-details">
										<h3 class="product-title">
											<a href="{{ $shop->url }}" class="text-capitalize">
													{{ $shop->title }}
											</a>
										</h3>
										<span class="product-price price"><ins><span class="amount">N{{ $shop->price }}.00</span></ins></span>
										<div class="product-actions-mobile">
											<a href="#" class="button add-to-cart-button medium">Add To Cart</a>
										</div>
									</div>
								</div>
                                @empty 
                                    No new products.
                                @endforelse

							</div>
						</div>
					</div>
				</div>
				<!-- Product Grid End -->

				<!-- Pagination Section 3 -->
				{{-- <div class="section-block pagination-3 pt-40 pb-40">
					<div class="row">
						<div class="column width-12">
							<ul>
								<li><a class="pagination-previous disabled" href="#"><span class="icon-left-open-mini left"></span> Prev Page</a></li>
								<li><a class="current" href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a class="pagination-next" href="#"> Next Page <span class="icon-right-open-mini right"></span></a></li>
							</ul>
						</div>
					</div>
				</div> --}}
				<!-- Pagination Section 3 End -->
 


@endsection