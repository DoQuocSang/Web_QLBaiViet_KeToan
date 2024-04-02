@extends('layout')
@section('content')
    <!-- =========== Start of Core Customer ============ -->
    <section class="pb-6 pb-lg-10 bg-color--primary mb-10">
        <div class="container">
        </div>
    </section>
    <!-- =========== End of Core Customer ============ -->


    <!-- =========== Start of Features ============ -->
       <!-- =========== Start of Blog Body ============ -->
       <section class="pb-10 pt-0 blog-articles ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="row mb-5">
                        @foreach($post_by_id as $key => $post)
                        {{ $post->post_title }}
                        {!! $post->post_content !!}
                        <!-- end of single card col-->
                         @endforeach
                    </div>
                    <!-- end of blog post row -->
                </div>
                <!-- end of blog post body col -->
                <aside class="col-12 col-md-5 col-lg-4 mt-6 mt-md-0 blog-sidebar">
                    <picture><img src={{asset('public/frontend/img/img_banner.png')}} alt="hero-image"
                        class="img-fluid mb-3"></picture>
                    <!-- end of search -->
                    <div class="widget widget_recent_entries">
                        <h2 class="widget-title">Bài viết mới nhất</h2>
                        <ul>
                            @foreach($latest_post as $key => $post)
                            <li><a href="{{ URL::to('/post-detail-by-id/' . $post->post_id) }}">{{$post->post_title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end of single widget -->
                </aside>
                <!-- end of sidebar col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>

    <!-- =========== Start of footer height emulator============ -->
    <!-- this height emulator helps to calculate the fixed footer height  -->
    <div class="height-emulator d-none d-lg-block"></div>
    <!-- =========== End of footer height emulator============ -->
@endsection
