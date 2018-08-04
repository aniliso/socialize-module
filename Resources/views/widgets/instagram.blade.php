<div class="our-blog latest-news section-spacing">
    <div class="container">
        <div class="theme-title-one">
            <h2>HABER VE DUYURULAR</h2>
        </div>
        <!-- /.theme-title-one -->
        <div class="wrapper">
            <div class="clearfix">
                <div class="latest-news-slider">
                    @foreach($posts as $post)
                        <div class="item">
                            <div class="single-blog">
                                <div class="image-box"> <img src="{{ $post->images->standard_resolution->url }}" alt="">
                                    <div class="overlay"><a target="_blank" href="{{ $post->link }}" class="date">{{ \Carbon\Carbon::createFromTimestamp($post->created_time)->formatLocalized('%d %B %Y') }}</a></div>
                                </div>
                                <div class="post-meta">
                                    <h5 class="title"><a target="_blank" href="{{ $post->link }}">{{ @$post->caption->text }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>