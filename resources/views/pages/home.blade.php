@extends('layout')
@section('content')
    <!-- =========== Start of Hero ============ -->
    <section class="hero hero--v1 bg-color--primary d-flex align-items-center hidden">
        <div class="section-overlap pos-abs-bottom jsElement" data-height="285"></div>
        <!-- end of section overlap bg -->
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-12 col-md-10 col-lg-7 mx-auto text-center z-index2">
                    <div class="hero-content reveal">
                        <h1 class="hero__title h3-font font-w--500 mb-2">Tôi có thể giúp gì được cho bạn</h1>
                        <p class="hero__description text-color--700 opacity--70 font-size--20 mb-3 mb-lg-4">
                            
                            {{-- <br> your stunning website. It’s easy and free. --}}
                        </p>
                        <!-- end of text content -->
                        {{-- <a href="#"
                            class="btn btn-size--md rounded--none btn-border btn-border--color--primary color--primary btn-hover--primary">
                            <span class="btn__text font-w--500">Get Started Now</span>
                        </a> --}}
                        <!-- end of button -->
                        <div class="widget widget_search mb-4">
                            <form action="#" class="form border--around rounded--05 bg-white">
                                <div class="input-group d-flex">
                                    <input type="search" class="form-control" placeholder="Nhập nội dung tìm kiếm..." required>
                                    <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span
                                            class="btn__text icon icon-zoom-bold"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of content -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
            
        </div>
    </section>
    <!-- =========== End of Hero ============ -->

    <!-- =========== Start of Core Customer ============ -->
    <section class="pb-6 pb-lg-10 bg-color--primary-light--1">
        <div class="container">
        </div>
    </section>
    <!-- =========== End of Core Customer ============ -->


    <!-- =========== Start of Features ============ -->
       <!-- =========== Start of Blog Body ============ -->
       <section class="pb-10 pt-0 blog-articles bg-color--primary-light--1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="row mb-5">
                        @php
                            $imageUrls = [
                                asset('public/frontend/img/icon-device.svg'),
                                asset('public/frontend/img/icon-assets.svg'),
                                asset('public/frontend/img/icon-secure.svg'),
                                asset('public/frontend/img/icon-ecommerce.svg')
                            ];
                        @endphp
                        @foreach($cate_post as $key => $cate)
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 mb-3">
                            <div class="card card-hover--shadow max-w--350 mx-auto">
                                <div class="d-flex flex-column align-items-center justify-content-center text-center p-3">
                                    <span class="color--primary font-size--60 mb-3">
                                        <img src="{{ $imageUrls[array_rand($imageUrls)] }}" alt="icon-secure">
                                    </span>
                                    <span class="font-size--20 font-w--600 text-color--700">
                                        {{$cate->category_name}}
                                    </span>
                                </div>
                                <div class="list-group list-group-flush">
                                    @if(count($posts_by_category[$cate->category_id]) > 0)
                                    @foreach($posts_by_category[$cate->category_id] as $post)
                                        <a href="{{ URL::to('/post-detail-by-id/' . $post->post_id) }}" class="list-group-item text-info">{{$post->post_title}}</a>
                                    @endforeach
                                @else
                                    <p class="list-group-item text-color--400">Không có bài viết nào trong chủ đề này</p>
                                @endif
                                </div>
                            </div>
                            <!-- end of single card -->
                        </div>
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

         <!-- =========== Start of Features ============ -->
         <section class="space--bottom space--top jsElement bg-color--primary" data-pull="0">
            <div class="container">
                <h1 class="hero__title h3-font font-w--500 mb-4 text-center ">Danh sách kênh hỗ trợ</h1>
                <div class="row  row-cols-1 row-cols-md-2 row-cols-lg-4">
                    @foreach($all_link as $key => $link)
                    <div class="col mb-3">
                        <a href="{{ URL::to($link->url) }}" class="card border--none bg-white text-center box-shadow--4 py-4 px-2 d-flex align-items-center card-hover--shadow-3d">
                            <span class="icon--lg color--primary bg-color--primary-opacity--10 rounded--full mb-2"> <i class="{{ $link->icon_class }}"></i> </span>
                            <h3 class="h5-font font-w--700 mb-1">{{ str_replace('*', '', $link->title) }}</h3>
                            {{-- <p class="font-size--16">If you are looking at blank cassettes on the web, you may be very confused at the price.</p> --}}
                        </a>
                        <!-- end of card -->
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
        <!-- =========== End of Features ============ -->

    <!-- =========== Start of Newsletter ============ -->
    {{-- <section class="space--bottom border--bottom jsElement" data-pull="-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-xl-9 mx-auto">
                    <div class="newsletter-form form--v8 bg-white py-6 py-lg-8 box-shadow--5 text-center">
                        <div class="mb-5 px-3 reveal">
                            <h2 class="h3-font mb-1">Start building your website now</h2>
                            <p>Just sign up and choose a theme from out library to get started</p>
                        </div>
                        <!-- end of title -->
                        <div class="col-12 col-md-10 col-lg-8 mx-md-auto reveal">
                            <form action="#" class="form bg-color--white-opacity--10 rounded--05 p-1">
                                <div class="input-group d-flex">
                                    <input type="email" class="form-control rounded--none"
                                        placeholder="Enter your email" required>
                                    <button class="btn btn-hover--splash btn-bg--primary rounded--none"
                                        type="submit"><span class="btn__text font-w--500">Get Started</span></button>
                                </div>
                            </form>
                            <!-- end of from -->
                        </div>
                    </div>
                </div>
                <!-- end of body col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section> --}}
    <!-- =========== End of Newsletter ============ -->

    <!-- =========== Start of footer height emulator============ -->
    <!-- this height emulator helps to calculate the fixed footer height  -->
    <div class="height-emulator d-none d-lg-block"></div>
    <!-- =========== End of footer height emulator============ -->
@endsection
