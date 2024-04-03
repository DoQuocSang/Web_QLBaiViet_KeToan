@extends('layout')
@section('content')
    <!-- =========== Start of Core Customer ============ -->
    <section class="pb-6 pb-lg-10 bg-color--primary">
        <div class="container">
        </div>
    </section>
    <!-- =========== End of Core Customer ============ -->

     <!-- =========== Start of Breadcrumb ============ -->
     <section class="breadcrumb--v1 bg-color--primary-light--1 mb-5 py-lg-9">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-color--transparent">
                            <li class="breadcrumb-item"><a href={{URL::to('/home')}}>Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bài viết</li>
                        </ol>
                    </nav>
                    <!-- end of breadcrumb nav -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>
    <!-- =========== End of Breadcrumb ============ -->

    <!-- =========== Start of Features ============ -->
       <!-- =========== Start of Blog Body ============ -->
       <section class="pt-0 blog-articles ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="row mb-5">
                        <h2 class="mb-5">
                            {{ $post_by_id->post_title }}
                        </h2>
                        {!! $post_content_with_class !!}
                        <!-- end of single card col-->
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

    <div class="bg-color--primary-light--1 border--bottom py-6 py-lg-10">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white py-5 rounded--05">
                        <!-- end of tags -->
                        <div class="border--bottom text-center pb-3">
                            <div class="socail-share-links">
                                <span class="socail-share-links-title">Chia sẻ:</span>
                                <div class="icon-group justify-content-center">
                                    <a href="#" class="color--primary"><i class="fab fa-medium-m"></i></a>
                                    <a href="#" class="color--primary"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="color--primary"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="color--primary"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="color--primary"><i class="fab fa-telegram-plane"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end of share links -->
                        <div class="text-center pt-3 px-2 px-lg-4">
                            <nav class="navigation post-navigation">
                                <div class="nav-links">
                                    <div class="nav-previous">
                                        @if($previous_post)
                                            <a href='{{URL::to('/post-detail-by-id/'.$previous_post->post_id)}}' class="meta-nav"><i class="icon icon-left-arrow"></i>Bài viết trước</a>
                                            <a href='{{URL::to('/post-detail-by-id/'.$previous_post->post_id)}}' class="post-title">{{ $previous_post->post_title }}</a>
                                        @endif
                                    </div>
                                    <!-- end of single item -->
                                    <div class="nav-next">
                                        @if($next_post)
                                            <a href='{{URL::to('/post-detail-by-id/'.$next_post->post_id)}}' class="meta-nav">Bài viết sau<i class="icon icon-right-arrow"></i></a>
                                            <a href='{{URL::to('/post-detail-by-id/'.$next_post->post_id)}}' class="post-title">{{ $next_post->post_title }}</a>
                                        @endif
                                    <!-- end of single item -->
                                </div>
                            </nav>
                        </div>
                        <!-- end of share links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of meta, sahre and navigation area -->

    <!-- =========== Start of footer height emulator============ -->
    <!-- this height emulator helps to calculate the fixed footer height  -->
    <div class="height-emulator d-none d-lg-block"></div>
    <!-- =========== End of footer height emulator============ -->
@endsection
