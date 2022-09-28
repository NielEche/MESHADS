<div class="section-block content-inner bkg-grey-ultralight">
    <div class="blog-masonry grid-container fade-in-progressively" data-layout-mode="fitRows" data-grid-ratio="1.5" data-animate-resize data-animate-resize-duration="700">
        <div class="row">
            <div class="column width-12">
                <h4 class="vertical-title mb-mobile-50">Studio News</h4>
            </div>
        </div>
        <div class="row">
            <div class="column width-12">
                <div class="row grid content-grid-3 clearfix">

                    @foreach ($posts as $post)
                        <div class="grid-item">
                            <article class="post">
                                <div class="post-content">
                                    <div class="with-background">
                                        <div class="post-info">
                                            <span class="post-date show-on-mobile">{{ $post->created_at->format('d M Y') }}</span>
                                        </div>
                                        <h4 class="post-title"><a href="{{ route('blogdata.details',['post' => $post->slug] ) }}">{{ $post->title }}</a></h4>
                                        <div class="post-excerpt">
                                            {{-- $post->shortContent ? \Illuminate\Support\Str::limit($post->shortContent, 300) : '' --}}
                                            {{ $post->shortcontent }}
                                        </div>
                                        <a href="{{ route('blogdata.details',['post' => $post->slug] ) }}" class=" read-more"> Read
                                            <span class="icon-right-open-mini right"></span></a>
                                    </div>
                                </div>
                            </article>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>