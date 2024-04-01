@extends('layout')

@section('content')
    <!-- =========== End of Spacer ============ -->
    <div class="pt-5 pt-lg-9"></div>
    <!-- =========== End of Spacer ============ -->

    <!-- =========== Start of Breadcrumb ============ -->
    <section class="breadcrumb--v1 bg-color--primary-light--1 py-5 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-color--transparent">
                            <li class="breadcrumb-item"><a href="#demo.html">Trang chủ</a></li>
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

    <!-- =========== Start of Blog Body ============ -->
    <section class="pb-10 pt-0 blog-articles bg-color--primary-light--1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="row mb-5">
                        @foreach($cate_post as $key => $cate)
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 mb-3">
                            <div class="card max-w--350 mx-auto">
                                <div class="d-flex flex-column align-items-center justify-content-center text-center p-3">
                                    <span class="color--primary font-size--60">
                                        <i class="icon icon-micro-payments"></i>
                                    </span>
                                    <span class="font-size--20 font-w--600 text-color--700">
                                        {{$cate->category_name}}
                                    </span>
                                </div>
                                <div class="list-group list-group-flush">
                                    @if(count($posts_by_category[$cate->category_id]) > 0)
                                    @foreach($posts_by_category[$cate->category_id] as $post)
                                        <a href="{{ URL::to('/post-detail/' . $post->post_id) }}" class="list-group-item text-info">{{$post->post_title}}</a>
                                    @endforeach
                                @else
                                    <p class="list-group-item text-color--400">Không có bài viết nào trong chủ đề này</p>
                                @endif
                                </div>
                                {{-- <div class="card-body py-2">
                                    <a href="#" class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="icon icon-folder-17 color--primary mr-1"></i>
                                            <span class="text-color--700 font-size--18 font-w--500">37 topics</span>
                                        </div>
                                        <i class="icon icon-small-right arrow_right color--primary"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <!-- end of single card -->
                        </div>
                        <!-- end of single card col-->
                         @endforeach
                    </div>
                    <!-- end of blog post row -->
                    {{-- <div class="row">
                        <div class="col">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item page-item--page-gap">...</li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                            <!-- end of pagination -->
                        </div>
                        <!-- end of pagination col -->
                    </div> --}}
                    <!-- end of pagination row -->
                </div>
                <!-- end of blog post body col -->
                <aside class="col-12 col-md-5 col-lg-4 mt-6 mt-md-0 blog-sidebar">
                    <div class="widget widget_search mb-4">
                        <form action="#" class="form border--around rounded--05 bg-white">
                            <div class="input-group d-flex">
                                <input type="search" class="form-control" placeholder="Type to search..." required>
                                <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span
                                        class="btn__text icon icon-zoom-bold"></span></button>
                            </div>
                        </form>
                    </div>
                    <!-- end of search -->
                    <div class="widget widget_recent_entries">
                        <h2 class="widget-title">Bài viết mới nhất</h2>
                        <ul>
                            @foreach($latest_post as $key => $post)
                            <li><a href="#">{{$post->post_title}}</a></li>
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
    <!-- =========== End of Blog Body ============ -->


    <!-- =========== Start of Newsletter ============ -->
    <section class="bg-color--white">
        <div class="section-overlap bg-color--primary-light--1 pos-abs-top jsElement" data-height="50%"></div>
        <!-- end of section overlap bg -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div
                        class="newsletter-form form--v3 position-relative d-lg-flex align-items-center bg-color--primary rounded--10 py-4 p-lg-4 p-xl-7">
                        <div class="svg-shape--top--right h-100">
                            <img src={{ asset('public/frontend/img/layout/diagonal-shape-7.svg') }} alt="wave"
                                class="svg h-100">
                        </div>
                        <!-- end of bg -->
                        <div class="col-12 col-lg-6 pr-lg-5 mb-3 mb-lg-0 text-center text-lg-left">
                            <h2 class="h3-font color--white">Subscribe our newsletter and get useful information every week
                            </h2>
                        </div>
                        <!-- end of title -->
                        <div class="col-12 col-md-10 col-lg-6 mx-md-auto">
                            <form action="#" class="form bg-color--white-opacity--10 rounded--05 p-1">
                                <div class="input-group d-flex">
                                    <input type="email" class="form-control" placeholder="Enter your email" required>
                                    <button class="btn btn-hover--splash btn-bg--primary" type="submit"><span
                                            class="btn__text"><i class="icon icon-arrow-right"></i></span></button>
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
    </section>
    <!-- =========== End of Newsletter ============ -->
@endsection
