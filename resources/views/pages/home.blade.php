@extends('layout')
@section('content')

<!-- =========== Start of Hero ============ -->
<section class="hero hero--v1 d-flex align-items-center hidden">
    <div class="section-overlap border-top bg-color--primary-light--1 pos-abs-bottom jsElement" data-height="285"></div>
    <!-- end of section overlap bg -->
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-12 col-md-10 col-lg-7 mx-auto text-center z-index2">
                <div class="hero-content reveal">
                    <h1 class="hero__title h2-font font-w--500 mb-2">HOME</h1>
                    <p class="hero__description text-color--700 opacity--70 font-size--20 mb-3 mb-lg-4">SpaceMax unites
                        beauty and advanced technology to create <br> your stunning website. It’s easy and free.</p>
                    <!-- end of text content -->
                    <a href="#"
                        class="btn btn-size--md rounded--none btn-border btn-border--color--primary color--primary btn-hover--primary">
                        <span class="btn__text font-w--500">Get Started Now</span>
                    </a>
                    <!-- end of button -->
                </div>
                <!-- end of content -->
            </div>
            <!-- end of col -->
        </div>

    </div>
</section>
<!-- =========== End of Hero ============ -->

<!-- =========== Start of Core Customer ============ -->
<section class="pb-6 pb-lg-10 bg-color--teal-light--1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-5 mx-auto text-center reveal bg-color--teal ">
                <div class="section-title text--white">
                    <h4>Danh sách các kênh hỗ trợ</h4>
                    <ul class="list-inline d-flex justify-content-center align-items-start"> <!-- Thêm class align-items-start -->
                        @foreach ($links as $link)
                            <li class="list-inline-item">
                                <a href="{{ $link->url }}" class="d-block">
                                    <div class="d-flex flex-column align-items-center">
                                        @if ($loop->index == 0)
                                            <i class="fab fa-facebook-square fa-2x"></i>
                                            <span class="text--white mt-2">Cộng đồng hỗ trợ miễn phí qua Facebook</span>
                                        @elseif ($loop->index == 1)
                                            <i class="fas fa-headset fa-2x"></i>
                                            <span class="text--white mt-2">Diễn đàn hỗ trợ Einvoice VietNam</span>
                                        @elseif ($loop->index == 2)
                                            <i class="fab fa-youtube fa-2x"></i>
                                            <span class="text--white mt-2">Kênh video hỗ trợ qua Youtube</span>
                                        @else
                                            <i class="fas fa-video fa-2x"></i>
                                            <span class="text--white mt-2">Đào tạo/giải pháp trực tuyến qua Zoom</span>
                                        @endif
                                    </div>
                                    <span class="sr-only">{{ $link->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of section title row -->
    </div>
    <!-- end of container-fluid -->
</section>

@endsection
