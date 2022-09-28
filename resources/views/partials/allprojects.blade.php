<div class="section-block grid-filter-menu right left-on-mobile" data-target-grid="#recent-work">
    <div class="row">
        <div class="column width-12">
            <ul>
                <li>Categories:</li>
                <li><a class="active scroll-link" href="#recent-work" data-offset="-260" data-filter="*">All <sup class="project-count"></sup></a></li>

                @foreach ($categories as $category)
                    <li><a class="scroll-link" href="#recent-work" data-offset="-260" data-filter=".{{ strtolower($category->slug) }}">{{ $category->name }} <sup class="project-count"></sup></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div id="recent-work" class="section-block grid-container no-margins fade-in-progressively pt-0" data-layout-mode="masonry" data-grid-ratio="1" data-animate-filter-duration="1000" data-set-dimensions data-animate-resize data-animate-resize-duration="700">
    <div class="row">
        <div class="column width-12">
            <h4 class="vertical-title mb-mobile-50">Portfolio</h4>
        </div>
    </div>
    <div class="row">
        <div class="column width-12">
            <div class="row grid content-grid-3 clearfix">

                @foreach ($projects as $project)

                <div class="grid-item {{ strtolower($project->category->slug) }}">
                    <div class="thumbnail overlay-slide-in-top img-scale-in horizon color-white" data-animate-in="preset:slideInRightShort;duration:300ms;" 
                    data-threshold="0.2" data-hover-easing="easeInOutCirc" data-hover-speed="500" data-hover-bkg-color="#fcd804" data-hover-bkg-opacity="1">
                        <a class="overlay-link" href="{{ route('works.show', $project->slug) }}">
                            <img src="{{ $project->coverImage }}" alt="{{ $project->title }}"/>
                            <span class="overlay-info">
                                <span>
                                    <span>
                                        <span class="color-black project-title">{{ $project->title }}</span>
                                        <span class="color-black project-description">For {{ $project->client_name }}</span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>